<?php

namespace App\Http\Controllers\api;

use App\Models\Produto;
use App\Mail\CompraMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreProdutosPost;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProdutosPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutosPost $request)
    {
        //Os admins non poderán comprar produto
        if(auth()->user()->rol->key == 'regular'){
            //Se o usuario non comprou ese tipo de produto antes, crea o produto. Se si, fai un update
            $datosAlmacenar = $request->validated();
            $produtosDoUsuario = DB::table('produtos')->select('*')->where('user_id', Auth::user()->id)->get();
            $datosAlmacenar['prezo'] = $datosAlmacenar['prezo'] * $datosAlmacenar['cantidade'];

            $produtoXaCreado = false;
            $cantidadeNova = 0;
            $produtoConcretoId = 0;
            $prezoNovo = 0;
            foreach($produtosDoUsuario as $produto){
                if($datosAlmacenar['tipo_marisco'] == $produto->tipo_marisco){
                    $produtoXaCreado = true;
                    $cantidadeNova = $produto->cantidade+$datosAlmacenar["cantidade"];
                    $produtoConcretoId = $produto->id;
                    $prezoNovo = $produto->prezo + $datosAlmacenar["prezo"];
                }
            }

            if($produtoXaCreado){
                //Facer un update do produto do usuario concreto
                DB::table('produtos')->where('id', $produtoConcretoId)->update(['cantidade' => $cantidadeNova, 'prezo' => $prezoNovo]);
                
            }else{
                Produto::create($datosAlmacenar);
            }
            
            //Resta a cantidade ao total
            $cantidadeARestar = $datosAlmacenar['cantidade'];
            $mariscos = DB::table('mariscos')->select('*')->get();
            foreach($mariscos as $marisco){
                if($marisco->id == $datosAlmacenar['tipo_marisco']){
                    $cantidadeOrixinal = $marisco->cantidade;
                }
            }
            
            $cantidadeARestar = $datosAlmacenar['cantidade'];
            $cantidadeRestante = $cantidadeOrixinal - $cantidadeARestar;

            DB::table('mariscos')->where('id', $datosAlmacenar["tipo_marisco"])->update(['cantidade' => $cantidadeRestante]);
            
            $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
            $produtos = DB::table("produtos")->select('*')->where('user_id', Auth::user()->id)->get();
            return view("produtos.index")->with('estado', 'Produto engadido á cesta da compra')->with("mariscos",$mariscos)->with("produtos",$produtos);
        }else{
            return back()->with('estado', 'Un admin ou unha persoa non rexistrada non pode comprar produtos');
        }
    }

    public function deleteProducts()
    {
        if(auth()->user()->rol->key == 'regular'){
            $produtos = DB::table('produtos')->select('*')->where('user_id', Auth::user()->id)->get();
            $correo = new CompraMailable($produtos);

            $produtosABorrar = DB::table('produtos')->select('*')->where('user_id', Auth::user()->id);
            $produtosABorrar->delete();

            //Enviar un correo a todos os administradores
            $administradores = DB::table('users')->select('*')->where('rol_id', '1')->get();

            foreach($administradores as $administrador){
                Mail::to($administrador->email)->send($correo);
            }
            
            return back()->with('estado', 'Compra confirmada con éxito');
        }else{
            return back()->with('estado', 'Un admin ou unha persoa non rexistrada non pode comprar produtos');
        }
    }
}

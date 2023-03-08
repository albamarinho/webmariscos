<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->input("id"))->update(['tipo_compra' => $request['tipo_compra']]);
        return back()->with('estado','Tipo de compra actualizado');
    }

    public function borrarUsuario(){
        $user=User::find(Auth::user()->id);
        
        //Se o usuario ten produtos na cesta, estos son devoltos ao stock
        $produtos=DB::table('produtos')->select('*')->where('user_id',$user)->get();
            foreach($produtos as $produto){
                $cantidadeASumar = $produto->cantidade;
                $mariscos = DB::table('mariscos')->select('*')->get();
                foreach($mariscos as $marisco){
                    if($marisco->id == $produto->tipo_marisco){
                        $cantidadeOrixinal = $marisco->cantidade;
                    }
                }
                $cantidadeRestante = $cantidadeOrixinal + $cantidadeASumar;
                DB::table('mariscos')->where('id', $produto->tipo_marisco)->update(['cantidade' => $cantidadeRestante]);
            }

        $user->delete();
        $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();

        return redirect('/')->with('mariscos',$mariscos)->with('estado', 'Usuario borrado correctamente');
    }
}

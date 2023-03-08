<?php

use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ContactoController;
use App\Http\Controllers\api\MariscosController;
use App\Http\Controllers\api\PoliticaController;
use App\Http\Controllers\api\ProdutosController;
use App\Http\Controllers\api\UsuariosController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
    return view('index')->with("mariscos",$mariscos);
})->name('index');

Auth::routes();

Route::resource('mariscos', MariscosController::class);
Route::resource('produtos', ProdutosController::class);

// Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.index');

Route::get('contacto', function(){
    $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
    return view('contacto.index')->with("mariscos",$mariscos);
})->name('contacto.index');

Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::get('politica', function(){
    $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
    return view('politica.index')->with("mariscos",$mariscos);
})->name('politica.index');

// Route::get('usuarios', function(){
//     $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
//     $users = DB::table("users")->select('*')->distinct()->orderBy('name')->get();
//     return view('usuarios.index')->with("mariscos",$mariscos)->with("users",$users);
// })->name('usuarios.index')->middleware(['auth', 'rol.admin']);

Route::get('produtos', function(){
    $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
    $users = DB::table("users")->select('*')->distinct()->orderBy('name')->get();
    $produtos = DB::table("produtos")->select('*')->where('user_id', Auth::user()->id)->get();
    if(auth()->user()->rol->key == 'regular'){
        return view('produtos.index')->with("mariscos",$mariscos)->with("produtos",$produtos);
    }
    else if(auth()->user()->rol->key == 'admin'){
        return view('produtos.index')->with("mariscos",$mariscos)->with("users",$users);
    }
    else{
        return back();
    }
})->name('produtos.index');

Route::delete('produtos', [ProdutosController::class, 'deleteProducts'])->name('produtos.deleteProducts');

Route::put('user/{id}', [UsuariosController::class, 'update'])->name('user.update');
Route::delete('user', [UsuariosController::class, 'borrarUsuario'])->name('user.borrarUsuario');
<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.index');
    }

    public function store(Request $request){
        //Recibe os valores do formulario de contacto/index
        $rules = [
            'name' => 'required',
            'correo' => 'required|email',
            'mensaxe' => 'required',
        ];

        $customMessages = [
            'required' => 'O atributo :attribute é obrigatorio',
        ];

        //Para que envíe mensaxes personalizadas
        $this->validate($request, $rules, $customMessages);
        
        //Crea un Mailable cos valores do $request
        $correo = new ContactoMailable($request->all());

        //Enviar un correo a todos os administradores
        $administradores = DB::table('users')->select('*')->where('rol_id', '1')->get();

        foreach($administradores as $administrador){
            Mail::to($administrador->email)->send($correo);
        }

        return redirect()->route('contacto.index')->with('estado', 'Mensaxe enviada');
    }
}

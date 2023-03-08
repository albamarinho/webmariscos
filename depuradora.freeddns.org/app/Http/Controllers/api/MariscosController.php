<?php

namespace App\Http\Controllers\api;

use App\Models\Marisco;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMariscosPost;

class MariscosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('rol.admin')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
    //     return view('produtos.index')->with("mariscos", $mariscos);
    // }

    /**
     * Display the specified resource.
     *
     * @param Marisco $marisco
     * @return \Illuminate\Http\Response
     */
    public function show(Marisco $marisco)
    {
        $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
        return view('mariscos.show', ['marisco' => $marisco])->with("mariscos", $mariscos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Marisco $marisco
     * @return \Illuminate\Http\Response
     */
    public function edit(Marisco $marisco)
    {
        $mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get();
        return view("mariscos.edit", ["marisco" => $marisco])->with("mariscos", $mariscos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreMariscosPost  $request
     * @param Marisco $marisco
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMariscosPost $request, Marisco $marisco)
    {
        if(auth()->user()->rol->key == 'admin'){
            $marisco->update($request->validated());
            return back()->with('estado', 'Actualizado correctamente');
        }else{
            return back()->with('estado', 'Un usuario regular ou non rexistrado non pode modificar un marisco');
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliticaController extends Controller
{
    public function index(){
        return view('politica.index');
    }
}

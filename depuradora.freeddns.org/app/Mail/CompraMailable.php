<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompraMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Compra realizada";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produtos)
    {
        $this->name=Auth::user()->name;
        $this->surname=Auth::user()->surname;
        $this->enderezo=Auth::user()->enderezo;
        $this->dni=Auth::user()->dni;
        $this->email=Auth::user()->email;
        $this->produtos=$produtos;
        $this->tipo_compra=Auth::user()->tipo_compra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra')->with([
            "name" => $this->name,
            "surname" => $this->surname,
            "enderezo" => $this->enderezo,
            "dni" => $this->dni,
            "email" => $this->email,
            "produtos" => $this->produtos,
            "mariscos" => DB::table('mariscos')->select('*')->get(),
            "tipo_compra" => $this->tipo_compra,
        ]);
    }
}

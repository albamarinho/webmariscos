<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMariscosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mariscos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 30); //tipo de marisco
            $table->double('cantidade'); //en kilogramos, cantidade total do tipo concreto
            $table->double('custo_unitario'); //prezo por kilo
            $table->string("fotografia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mariscos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //o usuario ao que lle pertence este produto
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_marisco'); //tipo de marisco
            $table->foreign('tipo_marisco')->references('id')->on('mariscos')->onUpdate('cascade')->onDelete('cascade');
            $table->double('cantidade'); //cantidade do produto
            $table->double('prezo'); //A cantidade do produto * o prezo por kilo do marisco
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
        Schema::dropIfExists('produtos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('jogo_id')->nullable()->unsigned();
            $table->BigInteger('noticia_id')->nullable()->unsigned();
            $table->string('tipo');
            $table->string('lang');
            $table->string('texto');

            $table->foreign('jogo_id')->references('id')->on('jogos')->onDelete('cascade');
            $table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');
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
        Schema::dropIfExists('textos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlataformasdisponiveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataformasdisponiveis', function (Blueprint $table) {
            $table->unsignedBigInteger('jogo_id');
            $table->unsignedBigInteger('plataforma_id');

            $table->foreign('jogo_id')->references('id')->on('jogos')->onDelete('cascade');
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade');
            $table->primary(['jogo_id', 'plataforma_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plataformasdisponiveis');
    }
}

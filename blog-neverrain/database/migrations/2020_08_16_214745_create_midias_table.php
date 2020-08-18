<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jogo_id')->default(0);
            $table->unsignedBigInteger('noticia_id')->default(0);
            $table->string('tipo');
            $table->string('link');
            $table->string('alt');
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
        Schema::dropIfExists('midias');
    }
}

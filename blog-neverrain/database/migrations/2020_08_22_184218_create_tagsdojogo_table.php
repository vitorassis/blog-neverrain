<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsdojogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagsdojogo', function (Blueprint $table) {
            $table->unsignedBigInteger('jogo_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('jogo_id')->references('id')->on('jogos');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->primary(['jogo_id','tag_id']);
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
        Schema::dropIfExists('tagsdojogo');
    }
}

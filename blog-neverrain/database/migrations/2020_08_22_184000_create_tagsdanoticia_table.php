<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsdanoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagsdanoticia', function (Blueprint $table) {
            $table->unsignedBigInteger('noticia_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('noticia_id')->references('id')->on('noticias');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->primary(['noticia_id','tag_id']);
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
        Schema::dropIfExists('tagsdanoticia');
    }
}

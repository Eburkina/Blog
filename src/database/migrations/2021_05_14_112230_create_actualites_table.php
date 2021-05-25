<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('category_id');
            $table->integer('nombre_lus');
            $table->string('titre',100);
            $table->text('body');
            $table->string('image_couverture',100);
            $table->string('auteur',100);
            $table->string('tags',100);
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
        Schema::dropIfExists('actualites');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');

            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')
            ->references('id')
            ->on('publishers')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
            ->references('id')
            ->on('languages')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')
            ->references('id')
            ->on('conditions')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->string('imgPath');

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
        Schema::dropIfExists('books');
    }
}

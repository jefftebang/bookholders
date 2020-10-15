<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')
            ->references('id')
            ->on('authors')
            ->onDelete('set null')
            ->onUpdate('set null');

            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')
            ->references('id')
            ->on('books')
            ->onDelete('set null')
            ->onUpdate('set null');

            $table->integer('quantity')->nullable();

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
        Schema::dropIfExists('author_book');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade');
            $table->foreignId('condition_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->integer('pages');
            $table->string('type');
            $table->integer('price');
            $table->year('published_year');
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
};

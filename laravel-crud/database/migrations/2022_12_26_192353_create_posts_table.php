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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255)->nullable();
            $table->string("slug", 255)->nullable();
            $table->text("description")->nullable();
            $table->text("content")->nullable();
            $table->string("image")->nullable();
            $table->enum("posted", ['yes', 'no']);
            $table->timestamps();
            /* De esta forma se crean llaves foraneas */
            $table->foreignId("Category_id")->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); //automatic in laravel
            $table->string('slug');
            $table->string('title');
            $table->string('author');
            $table->text('body');
            $table->timestamp('published_at')->nullable();//nullable method makes the column optional.
            $table->timestamps(); //this will add created-at or updated-at timestamps to the table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}

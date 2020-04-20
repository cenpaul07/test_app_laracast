<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uroles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //moderator , manager etc
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('urole_user', function (Blueprint $table) {
            $table->primary(['user_id','urole_id']);
            $table->unsignedBigInteger('urole_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('urole_id')
                ->references('id')
                ->on('uroles')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //edit_forum
            $table->string('label')->nullable(); //edit_the_forum
            $table->timestamps();
        });

        Schema::create('ability_urole', function (Blueprint $table) {
            $table->primary(['urole_id', 'ability_id']);
            $table->unsignedBigInteger('urole_id');
            $table->unsignedBigInteger('ability_id');
            $table->timestamps();

            $table->foreign('urole_id')
                ->references('id')
                ->on('uroles')
                ->onDelete('cascade');

            $table->foreign('ability_id')
                ->references('id')
                ->on('abilities')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

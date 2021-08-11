<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            //the columns we wanted to add
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('created_by_user_id');
            $table->json('authorised_members')->nullable();
            $table->timestamps();

            //the column which is referenced by this table
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('created_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

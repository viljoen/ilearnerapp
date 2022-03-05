<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->boolean('isCompleted')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->softDeletes();




        });

        Schema::create('todos', function (Blueprint $table) {

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('created_by')->references('id')->on('users');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}

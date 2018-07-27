<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table)
        {
            $table->increments('questions_id');
            $table->timestamps();
            $table->string('question')->nullable();
            $table->string('choice_1');
            $table->string('choice_2');
            $table->string('choice_3')->nullable();
            $table->string('type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}

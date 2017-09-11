<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_survey')->nullable();
            $table->bigInteger('id_question')->nullable();
            $table->bigInteger('id_answer')->nullable();
            $table->string('score', 20)->nullable();
            $table->string('extra', 500)->nullable();
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
        Schema::dropIfExists('survey_question_answer');
    }
}

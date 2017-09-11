<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQaComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_qa_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_survey')->nullable();
            $table->bigInteger('id_question')->nullable();
            $table->bigInteger('id_answer')->nullable();
            $table->bigInteger('id_survey_user')->nullable();
            $table->text('comment')->nullable();
            $table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_qa_comments');
    }
}

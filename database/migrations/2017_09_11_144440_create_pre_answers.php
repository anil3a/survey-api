<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer', 600)->nullable();
            $table->string('visible_answer', 600)->nullable();
            $table->smallInteger('int_value')->nullable();
            $table->bigInteger('id_question')->nullable();
            $table->string('answer_type', 20)->nullable();
            $table->string('extra', 500)->nullable();
            $table->smallInteger('order')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('pre_answers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpnbkAnswerQuestionTable extends Migration
{
    /**
     * Run the migrations pivot tables.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipnbk_answer_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned();
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
        Schema::dropIfExists('ipnbk_answer_question');
    }
}

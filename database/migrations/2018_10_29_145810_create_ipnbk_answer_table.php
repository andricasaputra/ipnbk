<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpnbkAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipnbk_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->integer('question_id')->unsigned();
            $table->enum('nilai', [1,2,3,4])->default(4);
            $table->longText('penjelasan')->nullable();
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
        Schema::dropIfExists('ipnbk_answer');
    }
}

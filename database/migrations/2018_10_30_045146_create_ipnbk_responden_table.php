<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpnbkRespondenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipnbk_responden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ipnbk_id')->unsigned();
            $table->foreign('ipnbk_id')->references('id')->on('ipnbk')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('ipnbk_responden');
    }
}

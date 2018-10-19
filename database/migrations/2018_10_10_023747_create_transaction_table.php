<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('total');
            $table->string('email');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('reference_num');
            $table->string('status');
            $table->string('fb_id')->unique()->nullable();
            $table->unsignedInteger('client_id')->unsigned()->nullable();
            $table->timestamps();
            $table->engine = "InnoDB";
        });
        Schema::table('transactions', function(Blueprint $table)
        {
          $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cart', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->string('sender');
          $table->string('name')->nullable();
          $table->string('dname')->nullable();
          $table->string('amount');
          $table->string('quantity');
          $table->string('total');
          $table->string('email')->nullable();
          $table->string('address')->nullable();
          $table->string('mobile')->nullable();
          $table->text('message')->nullable();
          $table->string('giftcard');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}

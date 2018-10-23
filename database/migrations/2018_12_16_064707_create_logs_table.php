<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('logs', function (Blueprint $table) {
      $table->unsignedInteger('cart_id')->unsigned();
      $table->increments('id');
      $table->string('epin');
      $table->string('code')->nullable();
      $table->timestamps();
    });
    Schema::table('logs', function(Blueprint $table)
    {
      $table->foreign('cart_id')->references('id')->on('carts')->onDelete('restrict')->onUpdate('restrict');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('logs');
  }
}

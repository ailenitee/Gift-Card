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
    Schema::create('carts', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('brand_id')->unsigned();
      $table->unsignedInteger('theme_id')->unsigned();
      $table->unsignedInteger('product_id')->nullable()->unsigned();
      $table->unsignedInteger('transaction_id')->nullable()->unsigned();
      $table->string('user_id');
      $table->string('user_type');
      $table->string('sender');
      $table->string('name');
      $table->string('quantity');
      $table->string('address')->nullable();
      $table->string('message')->nullable();
      $table->string('mobile')->nullable();
      $table->string('total');
      $table->timestamps();
      $table->engine = "InnoDB";
    });
    Schema::table('carts', function(Blueprint $table)
    { 
      $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('restrict');
      $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('restrict')->onUpdate('restrict');
      $table->foreign('theme_id')->references('id')->on('themes')->onDelete('restrict')->onUpdate('restrict');
      $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('carts');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}

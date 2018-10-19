<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->unsignedInteger('client_id')->unsigned();
            $table->increments('id');
            $table->string('thumbnail');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::table('products', function(Blueprint $table)
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
        Schema::dropIfExists('products');
    }
}

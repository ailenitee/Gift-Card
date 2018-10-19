<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme');
            $table->unsignedInteger('category_id')->unsigned();
            $table->unsignedInteger('denomination_id')->unsigned();
            $table->timestamps();
            $table->engine = "InnoDB";
        });
        Schema::table('themes', function(Blueprint $table)
        {
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
          $table->foreign('denomination_id')->references('id')->on('denominations')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}

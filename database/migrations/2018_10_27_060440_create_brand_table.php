<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
          // TODO: client_id
            $table->increments('id');
            $table->unsignedInteger('client_id')->unsigned()->nullable();
            $table->string('brand');
            $table->string('themes');
            $table->string('logo');
            $table->string('printables')->nullable();
            $table->string('code')->unique()->nullable();
            $table->timestamps();
            $table->engine = "InnoDB";
        });
        Schema::table('brands', function(Blueprint $table)
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
        Schema::dropIfExists('brands');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
  protected $table = "denomination";
  protected $fillable = ["denomination"];

  public function getFillable(){
      return $this->fillable;
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
  protected $table = "themes";
  protected $fillable = ["theme","category"];

  public function getFillable(){
      return $this->fillable;
  }
}

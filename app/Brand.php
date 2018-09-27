<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $table = "brand";
  protected $fillable = ["brand","denomination","logo"];

  public function getFillable(){
      return $this->fillable;
  }
}

<?php

namespace App;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $table = "brands";
  protected $fillable = ["brand","theme","logo"];

  public function getFillable(){
      return $this->fillable;
  }
}

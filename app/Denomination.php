<?php

namespace App;
use App\Denomination;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
  protected $table = "denominations";
  protected $fillable = ["denomination"];

  public function getFillable(){
      return $this->fillable;
  }
}

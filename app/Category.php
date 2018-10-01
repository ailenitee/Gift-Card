<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = "category";
  protected $fillable = ["category"];

  public function getFillable(){
      return $this->fillable;
  }
}

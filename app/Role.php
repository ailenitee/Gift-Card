<?php

namespace App;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = "roles";
  protected $fillable = ["role"];

  public function getFillable(){
      return $this->fillable;
  }
}

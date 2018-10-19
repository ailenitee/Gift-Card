<?php

namespace App;
use App\Client;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = "clients";
  protected $fillable = ['code','name','bot_name','access_token','priority','physical'];

  public function getFillable(){
      return $this->fillable;
  }
}

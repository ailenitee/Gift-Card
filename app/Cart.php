<?php

namespace App;
use App\Cart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ["name","message","amount","quantity","email","user_id","total","giftcard"];

    public function getFillable(){
        return $this->fillable;
    }

}

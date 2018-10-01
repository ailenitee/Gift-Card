<?php

namespace App;
use App\Cart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ["user_id","theme_id","brand_id","transaction_id","sender","name","quantity","address","email","mobile"];

    public function getFillable(){
        return $this->fillable;
    }

}

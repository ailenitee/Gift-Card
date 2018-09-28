<?php

namespace App;
use App\Cart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ["brand_id","denomination_id","guest_id","transaction_id","sender","name","quantity","address","mobile","user_id","giftcard","theme"];

    public function getFillable(){
        return $this->fillable;
    }

}

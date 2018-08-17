<?php

namespace App;
use App\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Transaction extends Model
{
    protected $table = "cart";
    protected $fillable = ["name","message","amount","quantity","email","user_id","total","giftcard","refnum","address","city","state"];

    public function getFillable(){
        return $this->fillable;
    }

}

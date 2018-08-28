<?php

namespace App;
use App\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $fillable = ["name","email","user_id","total","refnum","address","city","state"];

    public function getFillable(){
        return $this->fillable;
    }

}

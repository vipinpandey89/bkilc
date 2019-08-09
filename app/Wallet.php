<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //

    protected $table = 'e_wallet';

      public $fillable = [
        'user_id',
    	'amount',
    	'paid_status'
    ];




}

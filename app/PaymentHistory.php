<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentHistory extends Model
{
    //

    protected $table = 'payment_history';

      public $fillable = [
        'user_id',
        'txn_id',
    	'price',
    	'status',
    	'create_date',
    	'payment_level'
    ];

}

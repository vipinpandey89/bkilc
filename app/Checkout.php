<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //

     protected $table = 'checkout';

      public $fillable = [
        'user_id',
        'paid_id',
        'card_status',
        'parent_id'
    	    	    	
    ];


}

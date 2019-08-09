<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //

     protected $table = 'commission';

      public $fillable = [
        'user_id',
        'comission_by_userId',
    	'commission_point',
    	'commission_level',
    	'paid_id',
    	'compv_expired'    	    	
    ];


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paypalSetting extends Model
{
    //
     protected $table = 'paypal_setting';

      public $fillable = [
        'business_id',
        'paypal_type'    	    	
    ];

}

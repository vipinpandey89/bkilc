<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    protected $table = 'business';

      public $fillable = [
        'business_name',
    	'phone',
    	'email',
    	'regione',
    	'city',
        'state',
    	'postcode',
        'logo',
        'status'
    ];

}

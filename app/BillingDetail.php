<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    //
    protected $table = 'billing_detail';

      public $fillable = [
        'user_id',
    	'paid_id',
    	'name',
    	'email',
    	'address',
    	'city',
    	'state',
    	'zip',
        'checkout_id'
    ];

}

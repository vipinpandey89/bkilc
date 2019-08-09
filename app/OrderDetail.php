<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
     protected $table = 'order_detail';

      public $fillable = [
        'product_id',
        'user_id',
    	'product_name',
    	'product_price',
    	'total_price',
    	'paid_id',
    	'status',
        'checkout_id',
        'expiry_date',
        'qr_code'
    ];


}

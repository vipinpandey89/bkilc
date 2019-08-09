<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convertion extends Model
{
    //
    protected $table = 'convertion';

      public $fillable = [
        'convertion_title',
        'convertion_euro',
    	'convertion_pv'    	   	    	
    ];

}

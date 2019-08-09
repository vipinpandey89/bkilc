<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewCms extends Model
{
    //

     protected $table = 'new_cms';

      public $fillable = [
        'title',
        'description',
    	'image'    	   	    	
    ];

}

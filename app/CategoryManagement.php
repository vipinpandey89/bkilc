<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryManagement extends Model
{
    //

     protected $table = 'affiliate_category';

      public $fillable = [
        'title',
        'parent_id',
    	    	    	
    ];

    
}

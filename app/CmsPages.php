<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPages extends Model
{
    //

      protected $table = 'cms_pages';

      public $fillable = [
        'page_title',
        'video',
    	'status'    	    	
    ];


}

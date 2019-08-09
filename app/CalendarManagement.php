<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarManagement extends Model
{
    //

     protected $table = 'calendar_management';

      public $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'image'
    	    	    	
    ];

}

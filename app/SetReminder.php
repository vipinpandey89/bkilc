<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetReminder extends Model
{
    //
    protected $table = 'set_reminder';

      public $fillable = [
        'reminder_type',
        'reminder_date'  	   	    	
    ];

}

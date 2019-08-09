<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusManagement extends Model
{
    //

    protected $table = 'bonus_management';

      public $fillable = [
        'user_id',
        'promoter_percentage',
        'bklic_profit',
        'date_apply'    	    	    	
    ];
}

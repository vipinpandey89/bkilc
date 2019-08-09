<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadCard extends Model
{
    //

    protected $table = 'upload-card';

      public $fillable = [
        'title',
        'image',
        'description',
        'amount',
        'status',
        'card_length',
        'card_length_days'    	    	
    ];


}

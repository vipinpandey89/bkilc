<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinimumValuePoint extends Model
{
    //


     protected $table = 'minimum_value_point';

      public $fillable = [
        'step',
        'point',
        'level_upgrade_point',
        'level_downline',
        'renuwal_account',
        'become_founder_euro',
        'level_founder_status'
    ];

}

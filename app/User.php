<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'userName','referralCode','telephoneNumber','postalCode','email', 'password','parent_id','role_type','is_deleted','status','remember_token','is_email_verify',
        'qr_code','dob','resiaddress','region','streat','fcode','pariva','is_profile_complete','profileimage','user_as','renewal_date','founder','founder_bonus_point_value','total_wallet','previous_parent_id','photo_id_document'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

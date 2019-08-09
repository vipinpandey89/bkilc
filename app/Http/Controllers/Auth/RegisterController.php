<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'telephoneNumber' => 'required|numeric|min:10',
            'postalCode' => 'required|numeric|min:5',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           // 'captcha' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        $checkReferralCodeParent = User::where('referralCode','=',strtoupper($data['referralCode']))->first();     
        

           return User::create([
                    'name' => $data['name'],
                    'userName'=>$data['userName'],
                    'parent_id'=> !empty($checkReferralCodeParent)?$checkReferralCodeParent->id:'0',
                    'referralCode'=>strtoupper(str_random(6)),
                    'telephoneNumber'=>$data['telephoneNumber'],
                    'postalCode'=>$data['postalCode'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
              
    }


}

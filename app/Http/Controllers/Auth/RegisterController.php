<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserGroup;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
        //dd($data);
        return Validator::make($data, [
            'username' => ['required', 'numeric', 'unique:general_users','digits:10', 'iranianNationalCode'],
            'phone_number' => ['required', 'numeric', 'digits_between:11,15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'optionsCheckboxes' => ['required', 'string', 'in:on'],
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
        $grope = UserGroup::where('name' , 'doctor')->first();
        return User::create([
            'username' => $data['username'],
            'acl'      => [],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'user_group_id' => $grope->id,
        ]);
    }



}

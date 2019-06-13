<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\System\SystemController;
use App\Models\GeneralDoctors;
use App\Models\GeneralPatients;
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
    protected $redirectTo = '/activate';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data['userType']);
        return Validator::make($data, [
            'username' => ['required', 'numeric', 'unique:general_users', 'digits:10', 'iranianNationalCode'],
            'userType' => ['required', 'string', 'in:user,doctor'],
            'phone_number' => ['required', 'numeric', 'unique:general_users', 'digits:11', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'optionsCheckboxes' => ['required', 'string', 'in:on'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return SystemController
     */
    protected function create(array $data)
    {
        //return dd($this->validatePhoneNumber($data['phone_number']));
        $grope = null;

        if ($data['userType'] === 'user'){
            $grope = UserGroup::where('name', 'patient')->first();

        }elseif ($data['userType'] === 'doctor'){
            $grope = UserGroup::where('name', 'doctor')->first();

        }

        if ($grope === null) {
            return dd('گروه کاربر وارد نشده است.');
        }

        //dd(Hash::make($data['password']));
        $user = User::create([
            'username' => $data['username'],
            'acl' => [],
            'password' => Hash::make($data['password']),
            'isActive' => 'inactive',
            'phone_number' => $this->validatePhoneNumber($data['phone_number']),
            'user_group_id' => $grope->id,
        ]);

        $sms = new SystemController();
        $sms->sendSMS($user->phone_number, $user->id);

        switch ($data['userType']){
            case 'user':
                GeneralPatients::create([
                    'user_id' => $user->id,
                    'national_number' => $user->username,
                ]);
                break;

            case 'doctor':
                GeneralDoctors::create([
                    'user_id' => $user->id,
                    'national_number' => $user->username,
                ]);
                break;

        }


        return $user;

    }

    /**
     * @param $phone_number
     * @return string
     */
    private function validatePhoneNumber($phone_number): string
    {
        $phone_number = substr($phone_number, 1);
        return '0098' . $phone_number;
    }

}

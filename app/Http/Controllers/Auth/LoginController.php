<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    private $type;

    /**
     * @return string|null
     */
    public function redirectTo(): ?string
    {
        switch (auth()->user()->userGroup->name ){

            case 'doctor':
                return '/doctor/panel';
                break;

            case 'patient':
                return '/patient/panel';
                break;

            case 'admin':
                return '/admin/panel';
                break;

        }

    }

    protected function validateLogin(Request $request)
    {

        if (strlen($request['username']) === 10){
            $this->type = 'username';
            $request->validate([
                $this->username() => 'required|numeric|digits:10|iranianNationalCode',
                'password' => 'required|string',
            ]);
        }else{
            $this->type = 'phone_number';
            $request['phone_number'] = $request['username'];
            unset($request['username']);

            $request->validate([
                $this->username() => 'required|numeric|digits:11|regex:/^09[0-9]{9}$/',
                'password' => 'required|string',
            ]);
            $request['phone_number'] = $this->validatePhoneNumber($request['phone_number']);
        }
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

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {

        if($this->type === 'username'){
            return 'username';
        }elseif ($this->type === 'phone_number'){
            return 'phone_number';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

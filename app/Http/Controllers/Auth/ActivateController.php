<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\System\SystemController;
use App\Models\ActivationCode;
use App\Models\UserGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivateController extends Controller
{
    public function showActivateionForm()
    {
        return view('auth.activate');
    }


    public function activate(Request $request){

        $request->validate([
            'numberActive' => ['required', 'numeric', 'digits:6']
        ]);

        $activationCode = ActivationCode::whereCode($request['numberActive'])->first();

        if(! $activationCode) {
            alert()->error('کاربر گرامی کد وارد شده صحیح نمی باشد.', 'وروود ناموفق')->persistent('باشه');
            return redirect(route('activate.show'));
        }

        if($activationCode->expire < Carbon::now()) {
            alert()->error('کاربر گرامی مدت اعتبار کد شما به پایان رسیده.', 'وروود ناموفق')->persistent('باشه');
            return redirect(route('activate.show'));
        }

        if($activationCode->used == true) {
            alert()->error('کاربر گرامی کد شما قبلا استفاده شده است.', 'وروود ناموفق')->persistent('باشه');
            return redirect(route('activate.show'));
        }

        $activationCode->update([
            'used' => true
        ]);

        auth()->user()->update([
            'isActive' => 'active'
        ]);
        $userGroup = UserGroup::where('id' , auth()->user()->user_group_id)->first();

        switch ($userGroup->name){

            case 'doctor':
                return redirect(route('doctor.editInformation'));
                break;

            case 'patient':
                return redirect(route('patient.editInformation'));
                break;
        }



    }

    public function resendSms()
    {
        $sms = new SystemController();
        $sms->sendSMS(auth()->user()->phone_number, auth()->user()->id);
        return back();
    }



}

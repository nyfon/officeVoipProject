<?php

namespace Illuminate\Foundation\Auth;

use App\Http\Controllers\System\SystemController;
use App\Models\ActivationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Password;

trait SendsPasswordResetEmails
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPhoneNumberForm()
    {
        return view('auth.passwords.phoneNumber');
    }

    public function phoneNumberForm(Request $request)
    {
        $this->validatePhoneNumber($request);
        $system = new SystemController();
        $phoneNumber = $system->validatePhoneNumber($request['phoneNumber']);
        $user = \App\User::where('phone_number' , $phoneNumber)->first();

        if(!is_null($user)){
            $system->sendSMS($user->phone_number, $user->id , 'forgetPassword');
            session_start();
            /*session is started if you don't write this line can't use $_Session  global variable*/
            $_SESSION["restPassword"]=$user->phone_number;
            return redirect(route('password.show.change'));
        }else{
            alert()->error('کاربر گرامی شماره شما در سیستم وجود ندارد.', 'وروود ناموفق')->persistent('باشه');
            return redirect(route('password.show.phoneNumber'));
        }
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordChange()
    {
        return view('auth.passwords.changePassword');
    }

    public function passwordChange(Request $request)
    {
        $this->validateChengePassword($request);
        session_start();
        $phoneNumber = $_SESSION["restPassword"];

        if(\App\User::where('phoneNumber' , $phoneNumber)->exists()){

            $user = User::where('phoneNumber' , $phoneNumber)->first();

            $active = ActivationCode::where('user_id', $user->id)
                ->where('type', 'forget')
                ->where('code', $request->serNumber)
                ->first();

            if($active != null){
                
                if($active->expire < Carbon::now()){

                    alert()->success('اعتبار این کد به پایان رسیده است.')->persistent('باشه');
                    return redirect(route('password.show.change'));
                }else{



                    $retern = $this->changePassword($user->id, $request->password);

                    if($retern == true){

                        alert()->success('رمز شما با موفقیت ویرایش شد.')->persistent('باشه');
                        return redirect(route('login'));
                    }else{
                        alert()->success('مشکلی در سیستم پیش امده است.')->persistent('باشه');
                        return redirect(route('login'));
                    }

                }

            }else{

                alert()->success('این کد در سیستم وجود ندارد.')->persistent('باشه');
                return redirect(route('password.show.change'));
            }


        }else{

            alert()->success('این شماره در سیستم ما وجود ندارد.')->persistent('باشه');
            return back();

        }

    }



    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validatePhoneNumber(Request $request)
    {
        $request->validate(['phoneNumber' => 'required|numeric|digits:11|regex:/^09[0-9]{9}$/']);
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateChengePassword(Request $request)
    {
        $request->validate([
            'disposablePassword' =>'required|digits:6|integer',
            'password'           => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}

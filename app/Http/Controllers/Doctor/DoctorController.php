<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Requests\Doctor\requestUpdateInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * show form update user data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editInformation()
    {
        $user = auth()->user();
        //dd($user->generalDoctor);
        return view('user.sections.Doctor.profile.editInformation', compact('user'));
    }

    /**
     * update info user
     * @param requestUpdateInformation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInformation(requestUpdateInformation $request): \Illuminate\Http\RedirectResponse
    {

        auth()->user()->update([
            'description' => $request['description'],
        ]);

        auth()->user()->generalDoctor->update([
            'name' => $request['name'],
            'family' => $request['family'],
            'medical_system_number' => $request['medicalSystemNumber'],
            'mail' => $request['mail'],
        ]);

        return back();
    }

    /**
     * convert user phone
     * @param $phone_number
     * @return string
     */
    private function validatePhoneNumber($phone_number): string
    {
        $phone_number = substr($phone_number, 1);
        return '0098' . $phone_number;
    }

    /**
     * show form password
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPasswordChange()
    {
        return view('user.sections.Doctor.profile.changePassword');
    }

    /**
     * check user password and update password
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function passwordChange(Request $request)
    {
        $this->validatePasswordChange($request);
        $user = auth()->user();
        if (Hash::check($request['oldPassword'], $user->password)) {

            $user->update([
                'password' => Hash::make($request['password']),
            ]);
            alert()->success('رمز ورود شما با موفقیت ویرایش شد.')->persistent('باشه');
            auth()->logout();
            return redirect(route('login'));
        }
        alert()->error('رمز ورود قبلی شما اشتباه است.', 'ویرایش ناموفق')->persistent('باشه');
        return back();

    }

    /**
     * validate form change password
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validatePasswordChange(Request $request): void
    {
        $this->validate($request, [
            'oldPassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

}

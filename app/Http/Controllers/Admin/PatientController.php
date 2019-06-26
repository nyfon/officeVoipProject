<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\System\SystemController;
use App\Http\Requests\Admin\Patient\storeRequest;
use App\Http\Requests\Admin\Patient\updateRequest;
use App\Models\GeneralPatients;
use App\Models\UserGroup;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index(){
        $userGroup = UserGroup::where('name', 'patient')->first();
        $users = $userGroup->users;
        return view('admin.sections.patient.index', compact('users'));
    }

    public function changeDoctorStatus(User $user , $status){

        $user->update([
            'is_status' => User::mergeIsStatus($status)
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();
    }

    public function destroy(User $user){

        $user->update([
            'is_status' => User::mergeIsStatus('deleted')
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();
    }


    public function create(){
        return view('admin.sections.patient.create');
    }

    public function store(storeRequest $request){

        $grope = UserGroup::where('name', 'patient')->first();
        $password = Str::random(8);
        $user = User::create([
            'username' => $request['username'],
            'acl' => [],
            'password' => Hash::make($password),
            'is_status' => User::mergeIsStatus('active'),
            'phone_number' => $request['phone_number'],
            'user_group_id' => $grope->id,
            'description' => $request['description'],
        ]);

        GeneralPatients::create([
            'user_id' => $user->id,
            'national_number' => $user->username,
            'name' => $request['name'],
            'family' => $request['family'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
        ]);

        $sms = new SystemController();
        $sms->sendSMS($user->phone_number, $user->id, 'addUserAdmin' ,['username'=> $user->username, 'password'=>$password]);

        alert()->success('کاربر گرامی درخواست شما با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return back();

    }

    public function show(User $user){
        return view('admin.sections.patient.show' , compact('user'));
    }

    public function update(User $user, updateRequest $request){
        $user->update([
            'description' => $request['description'],
        ]);

        $user->generalPatient->update([
            'name' => $request['name'],
            'family' => $request['family'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
        ]);

        alert()->success('کاربر گرامی درخواست شما با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return back();
    }

}

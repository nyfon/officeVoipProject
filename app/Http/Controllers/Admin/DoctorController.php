<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\System\SystemController;
use App\Http\Requests\Admin\Doctor\storeRequest;
use App\Http\Requests\Admin\Doctor\updateRequest;
use App\Models\GeneralDoctors;
use App\Models\UserGroup;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index(){
        $userGroup = UserGroup::where('name', 'doctor')->first();
        $users = $userGroup->users;
        return view('admin.sections.doctor.index', compact('users'));
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
        return view('admin.sections.doctor.create');
    }

    public function store(storeRequest $request){

        $grope = UserGroup::where('name', 'doctor')->first();
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

        GeneralDoctors::create([
            'user_id' => $user->id,
            'national_number' => $user->username,
            'name' => $request['name'],
            'family' => $request['family'],
            'medical_system_number' => $request['medicalSystemNumber'],
            'mail' => $request['mail'],
        ]);

        $sms = new SystemController();
        $sms->sendSMS($user->phone_number, $user->id, 'addUserAdmin' ,['username'=> $user->username, 'password'=>$password]);

        alert()->success('کاربر گرامی درخواست شما با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return back();

    }

    public function show(User $user){
        return view('admin.sections.doctor.show' , compact('user'));
    }

    public function update(User $user, updateRequest $request){

        $user->update([
            'description' => $request['description'],
        ]);

        $user->generalDoctor->update([
            'name' => $request['name'],
            'family' => $request['family'],
            'medical_system_number' => $request['medicalSystemNumber'],
            'mail' => $request['mail'],
        ]);

        alert()->success('کاربر گرامی درخواست شما با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return back();
    }

}

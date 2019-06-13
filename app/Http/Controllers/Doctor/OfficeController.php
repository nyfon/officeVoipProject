<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\System\SystemController;
use App\Http\Requests\Doctor\requestStoreOffice;
use App\Models\DoctorOffice;
use App\Models\VoipServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends SystemController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalDoctor = auth()->user()->generalDoctor;
        $offices = DoctorOffice::where('doctor_id', $generalDoctor->id)->get();
        return view('user.sections.doctor.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.sections.doctor.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestStoreOffice $request)
    {

        $user = auth()->user()->generalDoctor;
        $officeType = DoctorOffice::mergeOfficeType($request['officeType']);
        DoctorOffice::create([
            'user_id' => $user->id,
            'office_name' => $request['officeName'],
            'mobile_tel' => $this->validatePhoneNumber($request['mobileTel']),
            'office_type' => $officeType,
            'tel_type' => $this->checkOfficeType($request['mobileTel']),
            'address1' => $request['address1'],
            'address2' => $request['address1'],
        ]);
        alert()->success('مطب جدید با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return redirect(route('user.office.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param DoctorOffice $office
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorOffice $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DoctorOffice $office
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorOffice $office)
    {
        return view('user.sections.doctor.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param DoctorOffice $office
     * @return \Illuminate\Http\Response
     */
    public function update(requestStoreOffice $request, DoctorOffice $office)
    {
        $officeType = DoctorOffice::mergeOfficeType($request['officeType']);
        //$telType = DoctorOffice::mergeTelType($request['telType']);
        $office->update([
            'office_name' => $request['officeName'],
            'mobile_tel' => $this->validatePhoneNumber($request['mobileTel']),
            'office_type' => $officeType,
            'tel_type' => $this->checkOfficeType($request['mobileTel']),
            'address1' => $request['address1'],
            'address2' => $request['address1'],
        ]);
        alert()->success('ویرایش مطب با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return redirect(route('user.office.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DoctorOffice $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorOffice $office)
    {
        //
    }

    /**
     * @param $tel
     *
     * @return mixed
     */
    private function checkOfficeType($tel)
    {
        if ($tel[1] === '9') {
            return DoctorOffice::mergeTelType('mobile');
        }
        return DoctorOffice::mergeTelType('telephone');
    }



    public function addService(DoctorOffice $office){
        //$generalDoctor = auth()->user()->generalDoctor;
        $voipServices = VoipServices::where('is_active', VoipServices::mergeIsActive('active'))->get();
        //$offices = DoctorOffice::where('user_id', $generalDoctor->id)->select(['id' , 'name'])->get();
        return view('user.sections.doctor.office.addService', compact('voipServices' , 'office'));
    }
}

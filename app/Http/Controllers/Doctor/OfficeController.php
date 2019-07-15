<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\System\SystemController;
use App\Http\Requests\Doctor\requestStoreOffice;
use App\Models\DoctorOffice;
use App\Models\VirtualNumbers;
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
        return view('user.doctor.sections.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $virtualNumbers = auth()->user()->generalDoctor->virtualNumbers;
        return view('user.doctor.sections.office.create', compact('virtualNumbers'));
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
        $virtualNumbers = VirtualNumbers::where('id', $request['virtualNumber'])->where('status', 4)->first();
        $officeType = DoctorOffice::mergeOfficeType($request['officeType']);
        DoctorOffice::create([
            'doctor_id' => $user->id,
            'virtual_numbers_id' => $virtualNumbers->id,
            'office_name' => $request['officeName'],
            'mobile_tel' => $this->validatePhoneNumber($request['mobileTel']),
            'office_type' => $officeType,
            'tel_type' => $this->checkOfficeType($request['mobileTel']),
            'address1' => $request['address1'],
            'address2' => $request['address1'],
        ]);
        alert()->success('مطب جدید با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return redirect(route('doctor.office.index'));
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
        $virtualNumbers = auth()->user()->generalDoctor->virtualNumbers;
        return view('user.doctor.sections.office.edit', compact('office' ,'virtualNumbers'));
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
        $virtualNumbers = VirtualNumbers::where('id', $request['virtualNumber'])->where('status', 4)->first();
        //$telType = DoctorOffice::mergeTelType($request['telType']);
        $office->update([
            'office_name' => $request['officeName'],
            'virtual_numbers_id' => $virtualNumbers->id,
            'mobile_tel' => $this->validatePhoneNumber($request['mobileTel']),
            'office_type' => $officeType,
            'tel_type' => $this->checkOfficeType($request['mobileTel']),
            'address1' => $request['address1'],
            'address2' => $request['address1'],
        ]);
        alert()->success('ویرایش مطب با موفقیت ثبت شد.', 'موفق')->persistent('باشه');
        return redirect(route('doctor.office.index'));
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




}

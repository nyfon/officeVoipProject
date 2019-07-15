<?php

namespace App\Http\Controllers\Doctor;

use App\Models\DoctorOffice;
use App\Models\OfficeScheduleConfigs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index(){
        $days = [
            'sat' =>null,
            'sun' =>null,
            'mon' =>null,
            'tues' =>null,
            'wed' =>null,
            'thurs' =>null,
            'fri' =>null,
        ];

        foreach ($days as $key => $day){
            $days[$key] = OfficeScheduleConfigs::where('doctor_id', auth()->user()->generalDoctor->id)
                                                        ->where($key , '1')->get();
        }

        return view('user.doctor.sections.schedule.index' ,compact('days'));
    }

    public function create(DoctorOffice $office){

        $officeScheduleConfigs = null;
        if (OfficeScheduleConfigs::where('office_id', $office->id)->exists()){
            $officeScheduleConfigs = OfficeScheduleConfigs::where('office_id' , $office->id)->first();
        }

        return view('user.doctor.sections.schedule.create' , compact('office', 'officeScheduleConfigs'));
    }

    public function store(DoctorOffice $office, Request $request){

        $this->addSchedule($request,$office);

        alert()->success('برنامه جدید با موفقیت افزوده شد.', 'موفق')->persistent('باشه');
        return redirect(route('doctor.schedule.index'));
    }

    /**
     * add Schedule
     *
     * @param Request      $request
     * @param DoctorOffice $office
     */
    private function addSchedule(Request $request, DoctorOffice $office): void
    {
        OfficeScheduleConfigs::create([
            'is-active' => OfficeScheduleConfigs::mergeIsActive('active'),
            'office_id' => $office->id,
            'doctor_id' => auth()->user()->generalDoctor->id,

            'paitients-per-day' => $request['paitientsPerDay'],
            'minutes-per-patient' => $request['minutesPerPatient'],

            // sat
            'sat' => $this->mergeActiveteDay($request['day']['saturday']['start'], $request['day']['saturday']['end']),
            'sat-start-time' => $request['day']['saturday']['start'],
            'sat-finish-time' => $request['day']['saturday']['end'],

            // sun
            'sun' => $this->mergeActiveteDay($request['day']['sunday']['start'], $request['day']['sunday']['end']),
            'sun-start-time' => $request['day']['sunday']['start'],
            'sun-finish-time' => $request['day']['sunday']['end'],

            // mon
            'mon' => $this->mergeActiveteDay($request['day']['monday']['start'], $request['day']['monday']['end']),
            'mon-start-time' => $request['day']['monday']['start'],
            'mon-finish-time' => $request['day']['monday']['end'],

            // tues
            'tues' => $this->mergeActiveteDay($request['day']['tuesday']['start'], $request['day']['tuesday']['end']),
            'tues-start-time' => $request['day']['tuesday']['start'],
            'tues-finish-time' => $request['day']['tuesday']['end'],

            // wed
            'wed' => $this->mergeActiveteDay($request['day']['wednesday']['start'], $request['day']['wednesday']['end']),
            'wed-start-time' => $request['day']['wednesday']['start'],
            'wed-finish-time' => $request['day']['wednesday']['end'],

            // thurs
            'thurs' => $this->mergeActiveteDay($request['day']['thursday']['start'], $request['day']['thursday']['end']),
            'thurs-start-time' => $request['day']['thursday']['start'],
            'thurs-finish-time' => $request['day']['thursday']['end'],

            // fri
            'fri' => $this->mergeActiveteDay($request['day']['friday']['start'],$request['day']['friday']['end']),
            'fri-start-time' => $request['day']['friday']['start'],
            'fri-finish-time' => $request['day']['friday']['end'],
        ]);
    }



    private function mergeActiveteDay($start , $end){
        if (($start!==null)&&($end!==null)) {
            return 1;
        }
        return 2;
    }

}

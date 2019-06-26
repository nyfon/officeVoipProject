<?php

namespace App\Http\Controllers\Doctor;

use App\Models\PurchaseRows;
use App\Models\Purchases;
use App\Models\ReservedVirtualNumber;
use App\Models\VirtualNumbers;
use App\Models\VoipServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Morilog\Jalali\Jalalian;

class VirtualNumberController extends Controller
{
    public function index()
    {

        $voipServices = VoipServices::where('is_active', VoipServices::mergeIsActive('active'))
            ->where('type', VoipServices::mergeType('virtual_number'))->get();

        $virtualNumbers =[];
        if(VirtualNumbers::where('general_doctors_id' ,auth()->user()->id)->where('status' , 4)->exists()){
            $virtualNumbers = auth()->user()->generalDoctor->virtualNumbers;
        }

        return view('user.sections.Doctor.virtualNumber.index', compact('voipServices', 'virtualNumbers'));
    }

    public function addVirtualNumber(Request $request)
    {

        $reservedVirtualNumber = ReservedVirtualNumber::find('1');

        $service = VoipServices::where('id', $request['service'])->where('is_active', VoipServices::mergeIsActive('active'))->first();

        $purchases = Purchases::create([
            'time' => Carbon::now(),
            'total' => $service['cost'],
            'state' => 3,
            'type' => 2,
            'virtual_numbers_id' => null
        ]);

        $purchasesRows = PurchaseRows::create([
            'start_date_time' => Carbon::now(),
            'expire_time_stamp' => Carbon::now()->addMonths($service['duration']),
            'voip_services_id' => $service['id'],
            'purchases_id' => $purchases['id'],
            'virtual_numbers_id' => null
        ]);

        $retern = $this->chackAddVirtualNumberPurchases([
            'service'   =>  $service,
            'purchases' =>  $purchases,
            'purchaseRows'=>    $purchasesRows,
            'reservedVirtualNumber' =>  $reservedVirtualNumber
        ]);

        if ($retern) {
            alert()->success('کاربر گرامی درخواست شما با موفقیت انجام شد.', 'درخواست موفق')->persistent('باشه');
            return back();
        }

        alert()->error('مشکلی در سیستم پیش امده است.', 'درخواست ناموفق')->persistent('باشه');
        return back();
    }


    /**
     * @param $parameter
     *
     * @return bool
     */
    private function chackAddVirtualNumberPurchases($parameter): bool
    {
        $service = $parameter['service'];
        $purchases = $parameter['purchases'];
        $purchaseRows = $parameter['purchaseRows'];
        $reservedVirtualNumber = $parameter['reservedVirtualNumber'];

        $virtualNumbers = VirtualNumbers::create([
            'is_active' => 2,
            'active_date' => Carbon::now(),
            'deactive_date' => Carbon::now()->addMonths($service['duration']),
            'general_doctors_id' => auth()->user()->id,
            'reserved_numbers_id' => $reservedVirtualNumber->id,
            'virtual_number' => $reservedVirtualNumber->number,
            'service_id' => $service['id'],
            'purchases_id' => $purchases['id'],
            'expiration_date' => null,
            'status' => 4,
        ]);

        $purchases->update([
            'virtual_numbers_id' => $virtualNumbers['id'],
            'state' => 4,
        ]);

        $purchaseRows->update([
            'virtual_numbers_id' => $virtualNumbers['id']
        ]);

        return true;
    }

    public function addServiceShow(VirtualNumbers $virtualNumber){
        //$generalDoctor = auth()->user()->generalDoctor;
        $voipServices = VoipServices::where('is_active', VoipServices::mergeIsActive('active'))->where('type', VoipServices::mergeType('voip_services'))->get();
        //$offices = DoctorOffice::where('user_id', $generalDoctor->id)->select(['id' , 'name'])->get();
        return view('user.sections.doctor.virtualNumber.addService', compact('voipServices' , 'virtualNumber'));
    }

    public function addService(VirtualNumbers $virtualNumber ,Request $request){

        foreach ($request['voipService'] as $key => $serveis){
            if ($serveis === 'on'){
                $services[] = VoipServices::where('id', $key)->where('is_active', VoipServices::mergeIsActive('active'))->first();
            }
        }

        $total = 0;
        foreach ($services as $serviceTotal){
            $total += $serviceTotal->cost;
        }

        $purchases = Purchases::create([
            'time' => Carbon::now(),
            'total' => $total,
            'state' => 1,
            'type' => 1,
            'virtual_numbers_id' => $virtualNumber->id
        ]);

        foreach ($services as $service) {
            PurchaseRows::create([
                'start_date_time' => Carbon::now(),
                'expire_time_stamp' => Carbon::now()->addMonths($service['duration']),
                'voip_services_id' => $service['id'],
                'purchases_id' => $purchases['id'],
                'virtual_numbers_id' => $virtualNumber->id
            ]);
        }
        //alert()->success('کاربر گرامی درخواست شما با موفقیت انجام شد.', 'درخواست موفق')->persistent('باشه');
        return view('user.sections.doctor.virtualNumber.payment')->with(
            [
                'purchases' => $purchases
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function completeBuyService(Request $request)
    {
        $this->validate($request ,[
            'purchase' => 'required','numeric'
        ]);

        $purchases = Purchases::where('id' ,$request['purchase'])->first();
        $purchases->update([
            'state' => 4,
        ]);

        return redirect(route('doctor.virtualNumber.index'));
    }
}

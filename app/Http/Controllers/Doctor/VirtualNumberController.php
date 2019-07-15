<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\System\SystemController;
use App\Models\PurchaseRows;
use App\Models\Purchases;
use App\Models\ReservedVirtualNumber;
use App\Models\UserActiveServices;
use App\Models\VirtualNumbers;
use App\Models\VoiceCategories;
use App\Models\VoiceFiles;
use App\Models\VoicesOfServices;
use App\Models\VoipServices;
use Carbon\Carbon;

use Illuminate\Http\Request;


class VirtualNumberController extends SystemController
{
    public function index()
    {

        $voipServices = VoipServices::where('is_active', VoipServices::mergeIsActive('active'))
            ->where('type', VoipServices::mergeType('virtual_number'))->get();

        $virtualNumbers =[];
        if(VirtualNumbers::where('general_doctors_id' ,auth()->user()->id)->where('status' , 4)->exists()){
            $virtualNumbers = auth()->user()->generalDoctor->virtualNumbers;
        }

        return view('user.doctor.sections.virtualNumber.index', compact('voipServices', 'virtualNumbers'));
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
        $activeServices = UserActiveServices::where('virtual_numbers_id', $virtualNumber->id)->where('expiration_date' ,'>=', Carbon::now())->get();

        //$offices = DoctorOffice::where('user_id', $generalDoctor->id)->select(['id' , 'name'])->get();
        return view('user.doctor.sections.virtualNumber.addService', compact('voipServices' , 'virtualNumber', 'activeServices'));
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
        return view('user.doctor.sections.virtualNumber.payment')->with(
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

        foreach ($purchases->purchaseRows as $purchaseRow){
            UserActiveServices::create([
                'is_active'     => 2,
                'expiration_date' => $purchaseRow->expire_time_stamp,
                'purchase_id'   => $purchases->id,
                'services_id'   => $purchaseRow->voip_services_id,
                'service_name'  => $purchaseRow->voipService->service_name,
                'mobile_tel'    => auth()->user()->phone_number,
                'virtual_numbers_id'    => $purchases->virtual_numbers_id,
                'virtual_number'    => $purchases->virtualNumber->virtual_number,
            ]);
        }

        $purchases->update([
            'state' => 4,
        ]);

        return redirect(route('doctor.virtualNumber.index'));
    }

    public function sendVoice(VoipServices $service,Request $request){
        $activeServices = UserActiveServices::where('services_id', $service->id)->where('expiration_date' ,'>=', Carbon::now())->first();

        if($activeServices === null){
            alert()->error('شما اجازه این کار را ندارید', 'ارسال ناموفق')->persistent('باشه');
            return back();
        }

        $catgory = VoiceCategories::where('name','voise_users')->where('is_active', 2)->first();

        if ($catgory === null){
            alert()->success('دسته وارد نشده', 'ارسال موفق')->persistent('باشه');
            return back();
        }

        $this->validateSendVoice($request);

        $fileUplodaed = $this->uploadFile($request['voice'],'/voice/');

        $realPath = $fileUplodaed->getRealPath();

        $realPath =str_replace("C:\Users\mohamad\Desktop\officeVoipProject\public", "", $realPath);

        $voipeFile = VoiceFiles::create([
            'file_name' => $fileUplodaed->getFilename(),
            'location' => $realPath,
            'is_personal' => 2,
            'is_active' => 1,
            'is_personal_accepted' => 1,
            'uploader_id' => auth()->user()->id,
            'upload_time' => now(),
            'voice_categories_id' => $catgory->id,
        ]);

        VoicesOfServices::create([
            'active_services_id' => $activeServices->id,
            'voice_files_id' => $voipeFile->id,
            'is_active' => 1,
        ]);

        alert()->success('درخواست شما باموفقیت ثبت شده', 'ارسال موفق')->persistent('باشه');
        return back();
    }

    private function validateSendVoice(Request $request){

       return $request->validate([
            'voice' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:4000'
        ]);


    }

}

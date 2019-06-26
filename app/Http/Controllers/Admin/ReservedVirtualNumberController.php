<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ReservedVirtualNumber\storeRequest;
use App\Models\ReservedVirtualNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservedVirtualNumberController extends Controller
{
    public function index()
    {
        $reservedVirtualNumbers = ReservedVirtualNumber::where('is_active' , ReservedVirtualNumber::mergeIsActive('active'))->get();
        return view('admin.sections.reservedVirtualNumber.index', compact('reservedVirtualNumbers'));
    }

    public function store(storeRequest $request)
    {
        $parentId = null;
        if(ReservedVirtualNumber::where('number',$request['number'])->exists()){
            $parent = ReservedVirtualNumber::where('number',$request['number'])->latest()->first();
            $parent->update([
                'is_active' => ReservedVirtualNumber::mergeIsActive('onactive')
            ]);
            $parentId = $parent->id;
        }

        ReservedVirtualNumber::create([
            'number'    =>  $request['number'],
            'is_active' =>  ReservedVirtualNumber::mergeIsActive($request['isActive']),
            'is_vip_number' =>  $request['isVipNumber'],
            'parent_id' =>  $parentId,
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();

    }

    public function show(ReservedVirtualNumber $reservedVirtualNumber){

        $reservedVirtualNumbers = ReservedVirtualNumber::where('number' , $reservedVirtualNumber->number)
            ->where('is_active' , ReservedVirtualNumber::mergeIsActive('onactive'))->orderBy("parent_id")->get();
        return view('admin.sections.reservedVirtualNumber.index', compact('reservedVirtualNumbers'));
    }

}

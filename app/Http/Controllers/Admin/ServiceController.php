<?php

namespace App\Http\Controllers\Admin;


use App\Models\VoipServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index($type)
    {
        $services = VoipServices::where('is_active' , VoipServices::mergeIsActive($type))->get();
        if ($type === 'active'){
            return view('admin.sections.service.index', compact('services'));
        }else{
            return view('admin.sections.service.inactive', compact('services'));
        }

    }

    public function store(Request $request)
    {
        $parentId = null;

        if($request['parent_id'] !== 0){
            $parentId =$request['parent_id'];
        }

        if(VoipServices::where('id' , $parentId)->exists()){
            $parent = VoipServices::where('id' , $parentId)->first();

            $parent->update([
                'is_active'     => VoipServices::mergeIsActive('inactive'),
                'deactive_date' => Carbon::now()
            ]);
        }

        VoipServices::create([
            'service_name'    =>  $request['serviceName'],
            'is_active' =>  VoipServices::mergeIsActive('active'),
            'duration' =>  $request['duration'],
            'cost' =>  $request['cost'],
            'type' =>  VoipServices::mergeType($request['type']),
            'parent_id' =>  $parentId,
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();
    }

    public function show(VoipServices $service){

        $serviceCountes = VoipServices::all()->count();
        $serviceTarget = $service;

        for ($i=0; $i<=$serviceCountes; $i++ ){

            if ($serviceTarget->parent_id !== 0){
                $serviceParents[] =VoipServices::where('id' , $serviceTarget->parent_id)->first();
                $serviceTarget = end($serviceParents);
             /*   dd($serviceTarget);*/
            }
        }

        return view('admin.sections.service.parent', compact('service','serviceParents'));
    }

    public function disabling(VoipServices $service){
        $service->update([
            'is_active'     => VoipServices::mergeIsActive('inactive'),
            'deactive_date' => Carbon::now()
        ]);
        alert()->success('درخواست شما با موفقیت انجام شد', 'موفق')->persistent('باشه');
        return back();
    }

}

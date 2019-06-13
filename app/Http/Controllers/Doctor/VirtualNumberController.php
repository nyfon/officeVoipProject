<?php

namespace App\Http\Controllers\Doctor;

use App\Models\VoipServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualNumberController extends Controller
{
    public function index(){

        $voipServices = VoipServices::where('is_active', VoipServices::mergeIsActive('active'))
                                      ->where('type' , VoipServices::mergeType('virtual_number'))->get();

        return view('user.sections.doctor.virtualNumber.addService', compact('voipServices'));

    }
}

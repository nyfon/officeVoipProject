<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $reservedVirtualNumbers = ReservedVirtualNumber::where('is_active' , ReservedVirtualNumber::mergeIsActive('active'))->get();
        return view('admin.sections.reservedVirtualNumber.index', compact('reservedVirtualNumbers'));
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register/{userType}', 'RegisterController@showRegistrationForm')->name('register.show');
    $this->post('register', 'RegisterController@register')->name('register');


    // Activate Routes...
    $this->get('activate', 'ActivateController@showActivateionForm')->middleware('auth')->name('activate.show');
    $this->get('resendSms', 'ActivateController@resendSms')->middleware('auth')->name('resend.sms');
    $this->post('activate', 'ActivateController@activate')->middleware('auth')->name('activate');

    //  Forgot Password Routes...
    $this->get('password/phoneNumber', 'ForgotPasswordController@showPhoneNumberForm')->name('password.show.phoneNumber');
    $this->post('password/phoneNumber', 'ForgotPasswordController@phoneNumberForm')->name('password.phoneNumber');

    $this->get('password/change', 'ForgotPasswordController@showPasswordChange')->name('password.show.change');
    $this->post('password/change', 'ForgotPasswordController@passwordChange')->name('password.change');

});

Route::group(['namespace' => 'Doctor', 'middleware' => ['auth', 'checkActive', 'checkUser:doctor'], 'prefix' => 'doctor'], function () {
    // User profile
    $this->get('/editInformation', 'DoctorController@editInformation')->name('doctor.editInformation');
    $this->post('/updateInformation', 'DoctorController@updateInformation')->name('doctor.updateInformation');

    // User change password
    $this->get('password/change', 'DoctorController@showPasswordChange')->name('doctor.password.change.show');
    $this->post('password/change', 'DoctorController@passwordChange')->name('doctor.password.change');

    // Offices
    $this->group(['prefix' => 'office' ,'middleware' =>['userVirtualNumber']], function () {
        // index
        $this->get('/', 'OfficeController@index')->name('doctor.office.index');
        $this->get('/show/{office}', 'OfficeController@show')->name('doctor.office.show');

        // create
        $this->get('/create', 'OfficeController@create')->name('doctor.office.create');
        $this->post('/', 'OfficeController@store')->name('doctor.office.store');

        // edit
        $this->get('/edit/{office}', 'OfficeController@edit')->name('doctor.office.edit');
        $this->patch('/{office}/update', 'OfficeController@update')->name('doctor.office.update');
        // delete
        $this->delete('/{office}/delete', 'OfficeController@destroy')->name('doctor.office.destroy');


    });

    // Offices
    $this->group(['prefix' => 'virtualNumber'], function () {
        // index
        $this->get('/', 'VirtualNumberController@index')->name('doctor.virtualNumber.index');
        $this->post('/addVirtualNumber', 'VirtualNumberController@addVirtualNumber')->name('doctor.virtualNumber.addVirtualNumber');
        //add Voip service to office
        $this->get('/addService/{virtualNumber}', 'VirtualNumberController@addServiceShow')->name('doctor.virtualNumber.addServiceShow')->middleware('userVirtualNumber');
        $this->post('/addService/{virtualNumber}', 'VirtualNumberController@addService')->name('doctor.virtualNumber.addService')->middleware('userVirtualNumber');
        $this->post('/completeBuyService', 'VirtualNumberController@completeBuyService')->name('doctor.virtualNumber.complete.buy.service')->middleware('userVirtualNumber');

    });

});

Route::group(['namespace' => 'Patient', 'middleware' => ['auth', 'checkActive', 'checkUser:patient'], 'prefix' => 'patient'], function () {
    // User profile
    $this->get('/editInformation', 'PatientController@editInformation')->name('patient.editInformation');
    $this->post('/updateInformation', 'PatientController@updateInformation')->name('patient.updateInformation');

    // User change password
    $this->get('password/change', 'PatientController@showPasswordChange')->name('patient.password.change.show');
    $this->post('password/change', 'PatientController@passwordChange')->name('patient.password.change');

});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'checkActive', 'checkUser:admin'], 'prefix' => 'admin'], function () {

    Route::group(['prefix' => 'panel'], function () {
        $this->get('/', 'PanelController@index')->name('admin.panel.index');
    });

    // Reserved Virtual Number
    $this->group(['prefix' => 'reservedVirtualNumber'], function () {
        // index
        $this->get('/', 'ReservedVirtualNumberController@index')->name('admin.reservedVirtualNumber.index');
        $this->get('/show/{reservedVirtualNumber}', 'ReservedVirtualNumberController@show')->name('admin.reservedVirtualNumber.show');
        $this->post('/', 'ReservedVirtualNumberController@store')->name('admin.reservedVirtualNumber.store');

    });

    // doctor
    $this->group(['prefix' => 'doctor'], function () {
        // index
        $this->get('/', 'DoctorController@index')->name('admin.doctor.index');
        $this->get('/show/{user}', 'DoctorController@show')->name('admin.doctor.show');

        // create
        $this->get('/create', 'DoctorController@create')->name('admin.doctor.create');
        $this->post('/', 'DoctorController@store')->name('admin.doctor.store');

        // edit
        $this->get('/edit/{user}', 'DoctorController@edit')->name('admin.doctor.edit');
        $this->patch('/{user}/update', 'DoctorController@update')->name('admin.doctor.update');
        $this->get('/changeDoctorStatus/{user}/{status}', 'DoctorController@changeDoctorStatus')->name('admin.doctor.changeStatus');

        // delete
        $this->delete('/{user}/delete', 'DoctorController@destroy')->name('admin.doctor.destroy');
    });

    // patient
    $this->group(['prefix' => 'patient'], function () {
        // index
        $this->get('/', 'PatientController@index')->name('admin.patient.index');
        $this->get('/show/{user}', 'PatientController@show')->name('admin.patient.show');

        // create
        $this->get('/create', 'PatientController@create')->name('admin.patient.create');
        $this->post('/', 'PatientController@store')->name('admin.patient.store');

        // edit
        $this->get('/edit/{user}', 'PatientController@edit')->name('admin.patient.edit');
        $this->get('/changePatientStatus/{user}/{status}', 'PatientController@changePatientStatus')->name('admin.patient.changeStatus');
        $this->patch('/{user}/update', 'PatientController@update')->name('admin.patient.update');

        // delete
        $this->delete('/{user}/delete', 'PatientController@destroy')->name('admin.patient.destroy');
    });

    // service
    $this->group(['prefix' => 'service'], function () {

        // index
        $this->get('/{type}', 'ServiceController@index')->name('admin.service.index');
        $this->get('/show/{service}', 'ServiceController@show')->name('admin.service.show');
        $this->post('/', 'ServiceController@store')->name('admin.service.store');

        $this->delete('/disabling/{service}', 'ServiceController@disabling')->name('admin.service.disabling');

    });


});

Route::get('/home', 'HomeController@index')->name('home');



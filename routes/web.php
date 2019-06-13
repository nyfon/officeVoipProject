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
});

Auth::routes();

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

Route::group(['namespace' => 'Doctor', 'middleware' => ['auth', 'checkActive'], 'prefix' => 'doctor'], function () {
    // User profile
    $this->get('/editInformation', 'DoctorController@editInformation')->name('doctor.editInformation');
    $this->post('/updateInformation', 'DoctorController@updateInformation')->name('doctor.updateInformation');

    // User change password
    $this->get('password/change', 'DoctorController@showPasswordChange')->name('doctor.password.change.show');
    $this->post('password/change', 'DoctorController@passwordChange')->name('doctor.password.change');

    // Offices
    $this->group(['prefix' => 'office'], function () {
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

        //add Voip Service to office
        $this->get('/addService/{office}', 'OfficeController@addService')->name('doctor.office.addService');
    });

    // Offices
    $this->group(['prefix' => 'virtualNumber'], function () {
        // index
        $this->get('/', 'VirtualNumberController@index')->name('doctor.virtualNumber.index');
        $this->get('/show/{office}', 'VirtualNumberController@show')->name('doctor.virtualNumber.show');
/*
        // create
        $this->get('/create', 'OfficeController@create')->name('doctor.office.create');
        $this->post('/', 'OfficeController@store')->name('doctor.office.store');

        // edit
        $this->get('/edit/{office}', 'OfficeController@edit')->name('doctor.office.edit');
        $this->patch('/{office}/update', 'OfficeController@update')->name('doctor.office.update');
        // delete
        $this->delete('/{office}/delete', 'OfficeController@destroy')->name('doctor.office.destroy');

        //add Voip Service to office
        $this->get('/addService/{office}', 'OfficeController@addService')->name('doctor.office.addService');*/
    });

});

Route::group(['namespace' => 'Patient', 'middleware' => ['auth', 'checkActive'], 'prefix' => 'patient'], function () {
    // User profile
    $this->get('/editInformation', 'PatientController@editInformation')->name('patient.editInformation');
    $this->post('/updateInformation', 'PatientController@updateInformation')->name('patient.updateInformation');

    // User change password
    $this->get('password/change', 'PatientController@showPasswordChange')->name('patient.password.change.show');
    $this->post('password/change', 'PatientController@passwordChange')->name('patient.password.change');

});

Route::get('/home', 'HomeController@index')->name('home');



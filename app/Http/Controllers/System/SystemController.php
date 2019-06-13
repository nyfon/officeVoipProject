<?php

namespace App\Http\Controllers\System;

use App\Models\ActivationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use nusoap_client;


class SystemController extends Controller
{

    /**
     * ser
     * @param $phoneUser
     * @param $userId
     * @param bool $forgetPassword
     * @return bool
     */
    public function sendSMS($phoneUser, $userId, $forgetPassword = false): ?bool
    {
        //dd(app_path() . '\Includes\nusoap2.php');
        include(app_path() . '\Includes\nusoap2.php');
        //include(app_path() . '/Includes/nusoap2.php');

        $url = "http://khadamati.pidasms.com/APPs/SMS/WebService.php?wsdl";
        $client = new nusoap_client($url, 'wsdl');

        if (!$forgetPassword) {
            $text_all = $this->smsActivate($userId);
        } else {
            $text_all = $this->smsForgetPassword($userId);
        }

        $err = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
        }

        // send sms function
        $id = $client->call(
            'sendSMS', array(
                'domain' => 'khadamati.pidasms.com',
                'username' => env('userSms'),   //your username
                'password' => env('passWord'),  //yourpassword
                'from' => '100033554334',           //your panle number for example 100045545244
                "to" => $phoneUser . ';',           // to which numers?
                "text" => $text_all,                //your sms text
                "isflash" => "1",
            )
        );

        // fill bellow parameter by your username and password
        //$result = $client->call('getCredit', array('domain' => 'khadamati.pidasms.com','username' => env('userSms'),'password' => env('passWord')));

        $result = $client->call('getDelivery', array('domain' => 'khadamati.pidasms.com', 'username' => env('userSms'), 'password' => env('passWord'), 'id' => $id));

        if ($client->fault) {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
        } else {
            $err = $client->getError();
            if ($err) {
                //echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } else {
                echo '<h2>Send Result </h2><pre>';
                print_r($result);
                echo '</pre>';
            }
        }
        return true;
    }

    /**
     * text and create code for activate user for sms
     * @param $userId
     * @return string
     */
    private function smsActivate($userId): string
    {
        $text1 = "<< ماتیکان >>";
        $text2 = "کاربر گرامی کد ورود به پنل شما : ";
        $text3 = $this->scopeCreateCode($userId);
        return $text1 . "\n" . $text2 . $text3;
    }

    /**
     * text and create code for forget password for sms
     * @param $userId
     * @return string
     */
    private function smsForgetPassword($userId): string
    {
        $text1 = "<< ماتیکان >>";
        $text2 = "کاربر گرامی رمز یک بار مصرف شما : ";
        $text3 = $this->scopeCreateCode($userId, true);
        return $text1 . "\n" . $text2 . $text3;
    }

    /**
     * @param      $userId
     * @param bool $forgetPassword
     *
     * @return int
     */
    private function scopeCreateCode($userId, $forgetPassword = false): int
    {
        if (!$forgetPassword) {
            $code = $this->code();
            if(ActivationCode::where('user_id' , $userId)->exists()){
                ActivationCode::where('user_id' , $userId)->update([
                    'code' => $code,
                    'expire' => Carbon::now()->addMinutes(30)
                ]);
            }else{
                ActivationCode::create([
                    'user_id' => $userId,
                    'code' => $code,
                    'expire' => Carbon::now()->addMinutes(30)
                ]);
            }
            return $code;
        }

        $code = $this->code();
        ActivationCode::create([
            'user_id' => $userId,
            'type' => 'forget',
            'code' => $code,
            'expire' => Carbon::now()->addMinutes(30)
        ]);
        return $code;
    }

    /**
     * crate code and check in table ActivationCode
     * @return int
     */
    private function code(): int
    {
        do {
            $code = rand(100000, 999999);
            $check_code = ActivationCode::whereCode($code)->where('used', true)->get();

        } while (!$check_code->isEmpty());
        return $code;
    }

    /**
     * @param $phone_number
     * @return string
     */
    public function validatePhoneNumber($phone_number): string
    {
        $phone_number = substr($phone_number, 1);
        return '0098' . $phone_number;
    }

    /**
     * upload image in server
     * @param $file
     * @param $imagePath
     * @param array $sizes
     * @return mixed
     */
    protected function uploadImages($file, $imagePath, $sizes)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/{$year}/" .$imagePath;

        $filename = $file->getClientOriginalName();

        $filename = $this->getFileName($filename);
        $file = $file->move(public_path($imagePath),  $filename);

        $url['images'] = $this->resize($file->getRealPath(), $sizes, $imagePath, $filename);
        $url['thumb'] = $url['images'][$sizes[0]];

        return $url;
    }

    /**
     * resize upload image
     * @param $path
     * @param $sizes
     * @param $imagePath
     * @param $filename
     * @return mixed
     */
    private function resize($path, $sizes, $imagePath, $filename)
    {
        $images['original'] = $imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $this->getFileName($filename);
            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }
}

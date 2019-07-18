<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class UserTicket extends Model
{
    protected $guarded =[];

    private const valueIsStatus = [
        'unread' => 1,
        'read' => 2,
        'answered' => 3,
    ];

    public static function mergeIsStatus($value)
    {
        return self::valueIsStatus[$value];
    }

    private const urgencyIsStatus = [
        'nonsignificant' => 1,
        'medium' => 2,
        'instantaneous' => 3,
    ];

    public static function mergeIsUrgency($value)
    {
        return self::urgencyIsStatus[$value];
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(CategoryTicket::class, 'category_ticket_id');
    }

    public function answer(){
        return $this->belongsTo(AnswerTicket::class);
    }

    public function isStatus(){
        $data= '';
        switch ($this->status){
            case '1':
                $data='خوانده نشده';
                break;

            case '2':
                $data='خوانده شده';
                break;

            case '3':
                $data='پاسخ داده شده';
                break;
        }
        return $data;
    }

    public function isUrgency(){
        $data= '';
        switch ($this->urgency){
            case '1':
                $data='کم اهمیت';
                break;

            case '2':
                $data='متوسط';
                break;

            case '3':
                $data='فوری';
                break;
        }
        return $data;
    }

    public function faData($data){
        return Jalalian::fromDateTime($data);
    }
}

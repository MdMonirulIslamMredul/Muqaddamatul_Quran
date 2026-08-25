<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    public static $data;

    public static function save_enrollment($request)
    {
        self::$data= new Enrollment();
        self::$data->user_id = $request->user_id;
        self::$data->service_id = $request->service_id;
        self::$data->payment_type = $request->payment_type;
        self::$data->number = $request->number;
        self::$data->transaction_id = $request->transaction_id;
        self::$data->save();

    }

    public function service()
    {
        return $this->belongsTo(Service::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}

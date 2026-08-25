<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNumber extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_numbers($request)
    {
        if($request->id){
            self::$data = PaymentNumber::find($request->id);
            self::$data->bkash = $request->bkash??null;
            self::$data->nagad = $request->nagad??null;
            self::$data->rocket = $request->rocket??null;
            self::$data->save();
        }
        else{
            self::$data = new PaymentNumber();
            self::$data->bkash = $request->bkash??null;
            self::$data->nagad = $request->nagad??null;
            self::$data->rocket = $request->rocket??null;
            self::$data->save();
        }

    }
}

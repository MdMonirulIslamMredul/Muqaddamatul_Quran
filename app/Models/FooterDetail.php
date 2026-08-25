<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterDetail extends Model
{
    use HasFactory;
    public static $data;
    public static function saveFooterDetail($request)
    {
//        dd($request);
        if($request->id){
            self::$data = FooterDetail::find($request->id);
            self::$data->details =$request->details;
            self::$data->details_b =$request->details_b;
            self::$data->details_ab =$request->details_ab;
            self::$data->credit =$request->credit;
            self::$data->credit_b =$request->credit_b;
            self::$data->credit_ab =$request->credit_ab;
            self::$data->save();
        }
        else{
            self::$data = new FooterDetail();
            self::$data->details =$request->details;
            self::$data->details_b =$request->details_b;
            self::$data->details_ab =$request->details_ab;
            self::$data->credit =$request->credit;
            self::$data->credit_b =$request->credit_b;
            self::$data->credit_ab =$request->credit_ab;
            self::$data->save();
        }

    }
}

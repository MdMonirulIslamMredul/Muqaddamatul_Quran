<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WebsiteLinks extends Model
{

    use HasFactory;
    public static $data;
    public static function saveWebsiteLinks($request)
    {
//        dd($request);
        if($request->id){
            self::$data = WebsiteLinks::find($request->id);
            self::$data->email =$request->email;
            self::$data->facebook =$request->facebook;
            self::$data->instagram =$request->instagram;
            self::$data->linkedIn =$request->linkedIn;
            self::$data->youtube =$request->youtube;
            self::$data->number =$request->number;
            self::$data->address =$request->address;
            self::$data->map_link =$request->map_link;
            self::$data->save();
        }
        else{
            self::$data = new WebsiteLinks();
            self::$data->email =$request->email;
            self::$data->facebook =$request->facebook;
            self::$data->instagram =$request->instagram;
            self::$data->linkedIn =$request->linkedIn;
            self::$data->youtube =$request->youtube;
            self::$data->number =$request->number;
            self::$data->address =$request->address;
            self::$data->map_link =$request->map_link;
            self::$data->save();
        }

    }
    //save  end




}

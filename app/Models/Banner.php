<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function saveBanner($request)
    {
        self::$data = new Banner();
        self::$data->title = $request->title??null;
        self::$data->title_bn = $request->title_bn??null;
        self::$data->title_ab = $request->title_ab??null;
        self::$data->short_details = $request->short_details??null;
        self::$data->short_details_bn = $request->short_details_bn??null;
        self::$data->short_details_ab = $request->short_details_ab??null;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function updateBanner($request,$id)
    {

        self::$data = Banner::find($id);
//        dd($request);
//        dd($request->file('image'));
        self::$data->title = $request->title??null;
        self::$data->title_bn = $request->title_bn??null;
        self::$data->title_ab = $request->title_ab??null;
        self::$data->short_details = $request->short_details??null;
        self::$data->short_details_bn = $request->short_details_bn??null;
        self::$data->short_details_ab = $request->short_details_ab??null;
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }
        self::$data->save();

    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'banner-'.rand().'.'. self::$image->Extension();
        self::$directory = 'website-banner/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerAndTitle extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_banner_title($request)
    {
        self::$data = new BannerAndTitle();
        self::$data->title = $request->title??null;
        self::$data->page = $request->page??null;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_banner_title($request)
    {

        self::$data = BannerAndTitle::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->page = $request->page??null;
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
        self::$directory = 'banner/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

}

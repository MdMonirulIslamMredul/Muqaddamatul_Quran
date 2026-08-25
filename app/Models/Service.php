<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_service($request)
    {
        self::$data = new Service();
        self::$data->service_title = $request->service_title??null;
        self::$data->price = $request->price??null;
        self::$data->service_details_small = $request->service_details_small??null;
        self::$data->service_details1 = $request->service_details1??null;
        self::$data->service_details2 = $request->service_details2??null;
        self::$data->service_details3 = $request->service_details3??null;
        self::$data->service_home = $request->service_home??null;
        self::$data->main_image = self::saveMainImage($request);
        self::$data->banner_image = self::saveBannerImage($request);
        self::$data->details_image1 = self::saveDetailsImage1($request);
        self::$data->details_image2 = self::saveDetailsImage2($request);
        self::$data->details_image3 = self::saveDetailsImage3($request);
        self::$data->save();
    }
    public static function update_service($request)
    {
        self::$data = Service::find($request->id);
        self::$data->service_title = $request->service_title??null;
        self::$data->price = $request->price??null;
        self::$data->service_details_small = $request->service_details_small??null;
        self::$data->service_details1 = $request->service_details1??null;
        self::$data->service_details2 = $request->service_details2??null;
        self::$data->service_details3 = $request->service_details3??null;
        self::$data->service_home = $request->service_home??null;
        self::$data->status = $request->status??null;
        if($request->file('main_image')){
            if(self::$data->main_image){
                if(file_exists(self::$data->main_image)){
                    unlink(self::$data->main_image);
                    self::$data->main_image = self::saveMainImage($request);
                }
            }
            else{
                self::$data->main_image = self::saveMainImage($request);
            }
        }
        if($request->file('banner_image')){
            if(self::$data->banner_image){
                if(file_exists(self::$data->banner_image)){
                    unlink(self::$data->banner_image);
                    self::$data->banner_image = self::saveBannerImage($request);
                }
            }
            else{
                self::$data->banner_image = self::saveBannerImage($request);
            }
        }
        if($request->file('details_image1')){
            if(self::$data->details_image1){
                if(file_exists(self::$data->details_image1)){
                    unlink(self::$data->details_image1);
                    self::$data->details_image1 = self::saveDetailsImage1($request);
                }
            }
            else{
                self::$data->details_image1 = self::saveDetailsImage1($request);
            }
        }
        if($request->file('details_image2')){
            if(self::$data->details_image2){
                if(file_exists(self::$data->details_image2)){
                    unlink(self::$data->details_image2);
                    self::$data->details_image2 = self::saveDetailsImage2($request);
                }
            }
            else{
                self::$data->details_image2 = self::saveDetailsImage2($request);
            }
        }
        if($request->file('details_image3')){
            if(self::$data->details_image3){
                if(file_exists(self::$data->details_image3)){
                    unlink(self::$data->details_image3);
                    self::$data->details_image3 = self::saveDetailsImage3($request);
                }
            }
            else{
                self::$data->details_image3 = self::saveDetailsImage3($request);
            }
        }

        self::$data->save();
    }

    private static function saveMainImage($request){
        self::$image = $request->file('main_image');
        self::$imageName = 'services_main_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'services/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveBannerImage($request){
        self::$image = $request->file('banner_image');
        self::$imageName = 'services_banner_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'services/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage1($request){
        self::$image = $request->file('details_image1');
        self::$imageName = 'services_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'services/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage2($request){
        self::$image = $request->file('details_image2');
        self::$imageName = 'services_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'services/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage3($request){
        self::$image = $request->file('details_image3');
        self::$imageName = 'services_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'services/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}

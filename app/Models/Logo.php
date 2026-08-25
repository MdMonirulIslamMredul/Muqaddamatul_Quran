<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    public static $data, $image, $imageName, $imageDirectory, $imageUrl;
    //    save category start
    public static function saveWebsiteLogo($request)
    {
        if($request->id){
            self::$data = Logo::find($request->id);
            self::$data->site_name = $request->site_name??null;
            if ($request->file('logo_image')) {
                if (self::$data->logo_image) {
                    if (file_exists(self::$data->logo_image)) {
                        unlink(self::$data->logo_image);
                        self::$data->logo_image = self::saveLogoImage($request);
                    }
                } else {
                    self::$data->logo_image = self::saveLogoImage($request);
                }
            }
            if ($request->file('logo_image1')) {
                if (self::$data->logo_image1) {
                    if (file_exists(self::$data->logo_image1)) {
                        unlink(self::$data->logo_image1);
                        self::$data->logo_image1 = self::saveLogoImage1($request);
                    }
                } else {
                    self::$data->logo_image1 = self::saveLogoImage1($request);
                }
            }
            if ($request->file('favicon')) {
                if (self::$data->favicon) {
                    if (file_exists(self::$data->favicon)) {
                        unlink(self::$data->favicon);
                        self::$data->favicon = self::saveFaviconImage($request);
                    }
                } else {
                    self::$data->favicon = self::saveFaviconImage($request);
                }
            }
            self::$data->save();
        }
        else{
            self::$data = new Logo();
            self::$data->site_name = $request->site_name??null;
            self::$data->logo_image = self::saveLogoImage($request);
            self::$data->logo_image1 = self::saveLogoImage1($request);
            self::$data->favicon = self::saveFaviconImage($request);
            self::$data->save();
        }

    }
    //save category end

    //save image start
    public static function saveLogoImage($request)
    {
        if ($request->file('logo_image')) {
            self::$image = $request->file('logo_image');
            self::$imageName = 'logo-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'logo/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }
    public static function saveLogoImage1($request)
    {
        if ($request->file('logo_image1')) {
            self::$image = $request->file('logo_image1');
            self::$imageName = 'logo-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'logo/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }

    public static function saveFaviconImage($request)
    {
        if ($request->file('favicon')) {
            self::$image = $request->file('favicon');
            self::$imageName = 'favicon-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'logo/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }
}

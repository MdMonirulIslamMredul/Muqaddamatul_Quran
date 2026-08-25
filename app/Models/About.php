<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $data, $image, $imageName, $directory, $imageUrl;

    public static function save_service($request)
    {
        self::$data = new About();

        if ($request->file('image1')) {
            self::$data->image1 = self::saveAboutImage1($request);
        }
        if ($request->file('image2')) {
            self::$data->image2 = self::saveAboutImage2($request);
        }
        if ($request->file('banner_image')) {
            self::$data->banner_image = self::saveBannerImage($request);
        }

        self::$data->title = $request->title;
        self::$data->title_bangla = $request->title_bangla;
        self::$data->title_ab = $request->title_ab;
        self::$data->des_eng = $request->des_eng;
        self::$data->des_bangla = $request->des_bangla;
        self::$data->des_ab = $request->des_ab;

        self::$data->specialties = $request->specialties;
        self::$data->specialties_bn = $request->specialties_bn;
        self::$data->specialties_ab = $request->specialties_ab;

        self::$data->features = $request->features;
        self::$data->features_bn = $request->features_bn;
        self::$data->features_ab = $request->features_ab;

        self::$data->hifz_edu_details = $request->hifz_edu_details;
        self::$data->hifz_edu_details_bn = $request->hifz_edu_details_bn;
        self::$data->hifz_edu_details_ab = $request->hifz_edu_details_ab;

        self::$data->save();
        return self::$data;
    }

    public static function update_service($request)
    {
        self::$data = About::find($request->id);

        if (!self::$data) {
            return null;
        }

        self::$data->title = $request->title;
        self::$data->title_bangla = $request->title_bangla;
        self::$data->title_ab = $request->title_ab;
        self::$data->des_eng = $request->des_eng;
        self::$data->des_bangla = $request->des_bangla;
        self::$data->des_ab = $request->des_ab;

        self::$data->specialties = $request->specialties;
        self::$data->specialties_bn = $request->specialties_bn;
        self::$data->specialties_ab = $request->specialties_ab;

        self::$data->features = $request->features;
        self::$data->features_bn = $request->features_bn;
        self::$data->features_ab = $request->features_ab;

        self::$data->hifz_edu_details = $request->hifz_edu_details;
        self::$data->hifz_edu_details_bn = $request->hifz_edu_details_bn;
        self::$data->hifz_edu_details_ab = $request->hifz_edu_details_ab;

        if ($request->file('image1')) {
            if (self::$data->image1 && file_exists(self::$data->image1)) {
                @unlink(self::$data->image1);
            }
            self::$data->image1 = self::saveAboutImage1($request);
        }

        if ($request->file('image2')) {
            if (self::$data->image2 && file_exists(self::$data->image2)) {
                @unlink(self::$data->image2);
            }
            self::$data->image2 = self::saveAboutImage2($request);
        }

        if ($request->file('banner_image')) {
            if (self::$data->banner_image && file_exists(self::$data->banner_image)) {
                @unlink(self::$data->banner_image);
            }
            self::$data->banner_image = self::saveBannerImage($request);
        }

        self::$data->save();
        return self::$data;
    }

    private static function saveAboutImage1($request)
    {
        self::$image = $request->file('image1');
        self::$imageName = 'about_image1-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveAboutImage2($request)
    {
        self::$image = $request->file('image2');
        self::$imageName = 'about_image2-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveBannerImage($request)
    {
        self::$image = $request->file('banner_image');
        self::$imageName = 'about_banner_image-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }
}

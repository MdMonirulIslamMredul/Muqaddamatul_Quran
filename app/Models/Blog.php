<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_blogs($request)
    {
        self::$data = new Blog();
        self::$data->title = $request->title??null;
        self::$data->title_bn = $request->title_bn??null;
        self::$data->title_ab = $request->title_ab??null;
        self::$data->short_details = $request->short_details??null;
        self::$data->short_details_bn = $request->short_details_bn??null;
        self::$data->short_details_ab = $request->short_details_ab??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details1_bn = $request->details1_bn??null;
        self::$data->details1_ab = $request->details1_ab??null;
        self::$data->details2 = $request->details2??null;
        self::$data->details2_bn = $request->details2_bn??null;
        self::$data->details2_ab = $request->details2_ab??null;

        self::$data->add_home = $request->add_home??null;
        if ($request->hasFile('main_image')) {
            self::$data->main_image = self::saveMainImage($request);
        }
        if ($request->hasFile('banner_image')) {
            self::$data->banner_image = self::saveBannerImage($request);
        }
        if ($request->hasFile('details_image1')) {
            self::$data->details_image1 = self::saveDetailsImage1($request);
        }
        if ($request->hasFile('details_image2')) {
            self::$data->details_image2 = self::saveDetailsImage2($request);
        }
        if ($request->hasFile('details_image3')) {
            self::$data->details_image3 = self::saveDetailsImage3($request);
        }
        self::$data->save();
    }
    public static function update_blogs($request)
    {
        self::$data = Blog::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->title_bn = $request->title_bn??null;
        self::$data->title_ab = $request->title_ab??null;
        self::$data->short_details = $request->short_details??null;
        self::$data->short_details_bn = $request->short_details_bn??null;
        self::$data->short_details_ab = $request->short_details_ab??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details1_bn = $request->details1_bn??null;
        self::$data->details1_ab = $request->details1_ab??null;
        self::$data->details2 = $request->details2??null;
        self::$data->details2_bn = $request->details2_bn??null;
        self::$data->details2_ab = $request->details2_ab??null;

        self::$data->add_home = $request->add_home??null;
        self::$data->status = $request->status??null;
        if($request->hasFile('main_image')){
            if(self::$data->main_image && file_exists(self::$data->main_image)){
                unlink(self::$data->main_image);
            }
            self::$data->main_image = self::saveMainImage($request);
        }
        if($request->hasFile('banner_image')){
            if(self::$data->banner_image && file_exists(self::$data->banner_image)){
                unlink(self::$data->banner_image);
            }
            self::$data->banner_image = self::saveBannerImage($request);
        }
        if($request->hasFile('details_image1')){
            if(self::$data->details_image1 && file_exists(self::$data->details_image1)){
                unlink(self::$data->details_image1);
            }
            self::$data->details_image1 = self::saveDetailsImage1($request);
        }
        if($request->hasFile('details_image2')){
            if(self::$data->details_image2 && file_exists(self::$data->details_image2)){
                unlink(self::$data->details_image2);
            }
            self::$data->details_image2 = self::saveDetailsImage2($request);
        }
        if($request->hasFile('details_image3')){
            if(self::$data->details_image3 && file_exists(self::$data->details_image3)){
                unlink(self::$data->details_image3);
            }
            self::$data->details_image3 = self::saveDetailsImage3($request);
        }

        self::$data->save();
    }

    private static function saveMainImage($request){
        if (!$request->hasFile('main_image')) {
            return null;
        }
        self::$image = $request->file('main_image');
        self::$imageName = 'blog_main_image-'.rand().'.'. self::$image->getClientOriginalExtension();
        self::$directory = 'blog/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveBannerImage($request){
        if (!$request->hasFile('banner_image')) {
            return null;
        }
        self::$image = $request->file('banner_image');
        self::$imageName = 'blog_banner_image-'.rand().'.'. self::$image->getClientOriginalExtension();
        self::$directory = 'blog/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage1($request){
        if (!$request->hasFile('details_image1')) {
            return null;
        }
        self::$image = $request->file('details_image1');
        self::$imageName = 'blog_details_image-'.rand().'.'. self::$image->getClientOriginalExtension();
        self::$directory = 'blog/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage2($request){
        if (!$request->hasFile('details_image2')) {
            return null;
        }
        self::$image = $request->file('details_image2');
        self::$imageName = 'blog_details_image-'.rand().'.'. self::$image->getClientOriginalExtension();
        self::$directory = 'blog/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage3($request){
        if (!$request->hasFile('details_image3')) {
            return null;
        }
        self::$image = $request->file('details_image3');
        self::$imageName = 'blog_details_image-'.rand().'.'. self::$image->getClientOriginalExtension();
        self::$directory = 'blog/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

    /**
     * Get localized value for a given field with language fallback.
     * If the active session language field is empty, falls back to default (English),
     * then Bangla, then Arabic, or whichever field has data.
     *
     * @param string $field Base field name e.g. 'title', 'short_details', 'details1', 'details2'
     * @return string|null
     */
    public function getLocalized($field)
    {
        $lang = session()->get('language');
        $fieldBn = $field . '_bn';
        $fieldAb = $field . '_ab';

        $valLang = null;
        if ($lang === 'bangla') {
            $valLang = $this->{$fieldBn} ?? null;
        } elseif ($lang === 'arabic') {
            $valLang = $this->{$fieldAb} ?? null;
        } else {
            $valLang = $this->{$field} ?? null;
        }

        // 1. If chosen language has data, return it
        if ($this->isFilled($valLang)) {
            return $valLang;
        }

        // 2. Fallback to English (default)
        if ($this->isFilled($this->{$field} ?? null)) {
            return $this->{$field};
        }

        // 3. Fallback to Bangla
        if ($this->isFilled($this->{$fieldBn} ?? null)) {
            return $this->{$fieldBn};
        }

        // 4. Fallback to Arabic
        if ($this->isFilled($this->{$fieldAb} ?? null)) {
            return $this->{$fieldAb};
        }

        return null;
    }

    public function getLocalizedTitleAttribute()
    {
        return $this->getLocalized('title');
    }

    public function getLocalizedShortDetailsAttribute()
    {
        return $this->getLocalized('short_details');
    }

    public function getLocalizedDetails1Attribute()
    {
        return $this->getLocalized('details1');
    }

    public function getLocalizedDetails2Attribute()
    {
        return $this->getLocalized('details2');
    }

    private function isFilled($value)
    {
        if (is_null($value) || $value === '') {
            return false;
        }
        $clean = trim(html_entity_decode(strip_tags($value, '<img><iframe><video><audio><svg>')));
        $clean = trim($clean, " \t\n\r\0\x0B\xc2\xa0");
        return $clean !== '';
    }
}


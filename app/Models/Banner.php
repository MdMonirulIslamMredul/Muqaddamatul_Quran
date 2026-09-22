<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static $data, $image, $imageName, $directory, $imageUrl;

    public static function saveBanner($request)
    {
        self::$data = new Banner();
        self::$data->title = $request->title ?? null;
        self::$data->title_bn = $request->title_bn ?? null;
        self::$data->title_ab = $request->title_ab ?? null;
        self::$data->short_details = $request->short_details ?? null;
        self::$data->short_details_bn = $request->short_details_bn ?? null;
        self::$data->short_details_ab = $request->short_details_ab ?? null;
        self::$data->button_text = $request->button_text ?? null;
        self::$data->button_text_bn = $request->button_text_bn ?? null;
        self::$data->button_text_ab = $request->button_text_ab ?? null;
        self::$data->button_url = $request->button_url ?? '/online-admission';
        self::$data->achievement_subtitle = $request->achievement_subtitle ?? 'বিগত ৫ বছর ধরে আমাদের সাফল্য';
        self::$data->stat1_value = $request->stat1_value ?? '১০,০০০';
        self::$data->stat1_label = $request->stat1_label ?? 'শিক্ষার্থী';
        self::$data->stat2_value = $request->stat2_value ?? '৪০+';
        self::$data->stat2_label = $request->stat2_label ?? 'শিক্ষক';
        self::$data->stat3_value = $request->stat3_value ?? '৮৯%';
        self::$data->stat3_label = $request->stat3_label ?? 'কোর্স কমপ্লিট রেট';

        if ($request->hasFile('image')) {
            self::$data->image = self::saveImage($request);
        }
        self::$data->save();
    }

    public static function updateBanner($request, $id)
    {
        self::$data = Banner::find($id);
        self::$data->title = $request->title ?? null;
        self::$data->title_bn = $request->title_bn ?? null;
        self::$data->title_ab = $request->title_ab ?? null;
        self::$data->short_details = $request->short_details ?? null;
        self::$data->short_details_bn = $request->short_details_bn ?? null;
        self::$data->short_details_ab = $request->short_details_ab ?? null;
        self::$data->button_text = $request->button_text ?? null;
        self::$data->button_text_bn = $request->button_text_bn ?? null;
        self::$data->button_text_ab = $request->button_text_ab ?? null;
        self::$data->button_url = $request->button_url ?? self::$data->button_url;
        self::$data->achievement_subtitle = $request->achievement_subtitle ?? self::$data->achievement_subtitle;
        self::$data->stat1_value = $request->stat1_value ?? self::$data->stat1_value;
        self::$data->stat1_label = $request->stat1_label ?? self::$data->stat1_label;
        self::$data->stat2_value = $request->stat2_value ?? self::$data->stat2_value;
        self::$data->stat2_label = $request->stat2_label ?? self::$data->stat2_label;
        self::$data->stat3_value = $request->stat3_value ?? self::$data->stat3_value;
        self::$data->stat3_label = $request->stat3_label ?? self::$data->stat3_label;

        if ($request->file('image')) {
            if (self::$data->image && file_exists(public_path(self::$data->image))) {
                @unlink(public_path(self::$data->image));
            }
            self::$data->image = self::saveImage($request);
        }
        self::$data->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = 'banner-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'website-banner/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(public_path(self::$directory), self::$imageName);
        return self::$imageUrl;
    }

    /**
     * Localized title helper.
     */
    public function getLocalizedTitleAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->title_bn ?: ($this->title ?: 'নূরুল কুরআন একাডেমি');
        } elseif ($lang === 'arabic') {
            return $this->title_ab ?: ($this->title_bn ?: $this->title);
        }
        return $this->title ?: ($this->title_bn ?: 'Noorul Quran Academy');
    }

    /**
     * Localized details helper.
     */
    public function getLocalizedDetailsAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->short_details_bn ?: ($this->short_details ?: 'শায়খ আহমাদুল্লাহ এর আস-সুন্নাহ ফাউন্ডেশন কর্তৃক পুরষ্কারপ্রাপ্ত অনলাইন একাডেমী। এতে রয়েছে আরবিভাষা, কুরআন, হাদীস, ফিকহ, আকীদা, হিফজসহ বিভিন্ন বিষয়ে অভিজ্ঞ শিক্ষকদের তত্ত্বাবধানে সাজানো লাইভ ও রেকর্ডেড কোর্সসমূহ। ঘরে বসেই শিখুন সহজ ও মানসম্মত ইসলামী শিক্ষা।');
        } elseif ($lang === 'arabic') {
            return $this->short_details_ab ?: ($this->short_details_bn ?: $this->short_details);
        }
        return $this->short_details ?: ($this->short_details_bn ?: 'Award-winning Islamic academy offering courses in Quran, Hadith, Arabic Language, and Hifz.');
    }

    /**
     * Localized button text helper.
     */
    public function getLocalizedButtonTextAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->button_text_bn ?: ($this->button_text ?: 'ই-ক্যাম্পাস');
        } elseif ($lang === 'arabic') {
            return $this->button_text_ab ?: ($this->button_text_bn ?: 'الحرم الإلكتروني');
        }
        return $this->button_text ?: ($this->button_text_bn ?: 'E-Campus');
    }
}

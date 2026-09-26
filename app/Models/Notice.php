<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'publish_date' => 'date',
        'expire_date'  => 'date',
        'is_pinned'    => 'boolean',
        'is_ticker'    => 'boolean',
        'status'       => 'boolean',
        'views_count'  => 'integer',
    ];

    /**
     * Scope for active/published notices.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1)
            ->where(function ($q) {
                $q->whereNull('expire_date')
                  ->orWhere('expire_date', '>=', Carbon::today()->toDateString());
            });
    }

    /**
     * Scope for pinned/featured notices.
     */
    public function scopePinned($query)
    {
        return $query->where('is_pinned', 1);
    }

    /**
     * Scope for ticker notices.
     */
    public function scopeTicker($query)
    {
        return $query->where('is_ticker', 1)->where('status', 1);
    }

    /**
     * Scope for filtering by category.
     */
    public function scopeByCategory($query, $category)
    {
        if (!empty($category) && $category !== 'all') {
            return $query->where('notice_category', $category);
        }
        return $query;
    }

    /**
     * Get title based on session language.
     */
    public function getLocalizedTitleAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->title_bn ?: ($this->title ?: $this->title_ar);
        } elseif ($lang === 'arabic') {
            return $this->title_ar ?: ($this->title_bn ?: $this->title);
        } else {
            return $this->title ?: ($this->title_bn ?: $this->title_ar);
        }
    }

    /**
     * Get short description based on session language.
     */
    public function getLocalizedShortDesAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->short_des_bn ?: $this->short_des;
        }
        return $this->short_des ?: $this->short_des_bn;
    }

    /**
     * Get long description based on session language.
     */
    public function getLocalizedLongDesAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'bangla') {
            return $this->long_des_bn ?: $this->long_des;
        }
        return $this->long_des ?: $this->long_des_bn;
    }

    /**
     * Get readable category name in current language.
     */
    public function getCategoryNameAttribute()
    {
        $categories = self::categoriesList();
        $lang = session()->get('language', 'bangla');
        $cat = $this->notice_category ?? 'general';

        if (isset($categories[$cat])) {
            return $lang === 'bangla' ? $categories[$cat]['bn'] : ($lang === 'arabic' ? $categories[$cat]['ar'] : $categories[$cat]['en']);
        }

        return ucfirst($cat);
    }

    /**
     * Get Category Badge Class and Styles.
     */
    public function getCategoryBadgeAttribute()
    {
        $categories = self::categoriesList();
        $cat = $this->notice_category ?? 'general';
        return $categories[$cat]['badge'] ?? 'bg-secondary';
    }

    /**
     * List of available notice categories with multilingual labels and styling.
     */
    public static function categoriesList()
    {
        return [
            'general' => [
                'bn' => 'সাধারণ নোটিশ',
                'en' => 'General Notice',
                'ar' => 'إشعار عام',
                'badge' => 'bg-info text-white',
                'color' => '#0284c7',
                'icon' => 'fa-bullhorn',
            ],
            'admission' => [
                'bn' => 'ভর্তি বিজ্ঞপ্তি',
                'en' => 'Admission Notice',
                'ar' => 'إشعار القبول',
                'badge' => 'bg-success text-white',
                'color' => '#16a34a',
                'icon' => 'fa-graduation-cap',
            ],
            'academic' => [
                'bn' => 'একাডেমিক নোটিশ',
                'en' => 'Academic Notice',
                'ar' => 'إشعار أكاديمي',
                'badge' => 'bg-primary text-white',
                'color' => '#2563eb',
                'icon' => 'fa-book',
            ],
            'exam' => [
                'bn' => 'পরীক্ষা ও ফলাফল',
                'en' => 'Exam & Result',
                'ar' => 'الامتحانات والنتائج',
                'badge' => 'bg-warning text-dark',
                'color' => '#d97706',
                'icon' => 'fa-file-text-o',
            ],
            'holiday' => [
                'bn' => 'ছুটির নোটিশ',
                'en' => 'Holiday Notice',
                'ar' => 'إشعار عطلة',
                'badge' => 'bg-danger text-white',
                'color' => '#dc2626',
                'icon' => 'fa-calendar-times-o',
            ],
            'event' => [
                'bn' => 'অনুষ্ঠান ও মাহফিল',
                'en' => 'Events & Programs',
                'ar' => 'الفعاليات والبرامج',
                'badge' => 'bg-purple text-white',
                'color' => '#9333ea',
                'icon' => 'fa-calendar-check-o',
            ],
            'urgent' => [
                'bn' => 'জরুরি বিজ্ঞপ্তি',
                'en' => 'Urgent Notice',
                'ar' => 'إشعار عاجل',
                'badge' => 'bg-danger text-white',
                'color' => '#b91c1c',
                'icon' => 'fa-exclamation-triangle',
            ],
        ];
    }

    /**
     * Check if attached file is PDF.
     */
    public function getIsPdfAttribute()
    {
        return strtolower($this->file_type) === 'pdf' || (empty($this->file_type) && str_ends_with(strtolower($this->pdf_file ?? ''), '.pdf'));
    }

    /**
     * Check if attached file is an Image.
     */
    public function getIsImageAttribute()
    {
        $ext = strtolower($this->file_type ?: pathinfo($this->pdf_file ?? '', PATHINFO_EXTENSION));
        return in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif']);
    }

    /**
     * Get font awesome icon class for file.
     */
    public function getFileIconAttribute()
    {
        if ($this->is_pdf) {
            return 'fa-file-pdf-o text-danger';
        }
        if ($this->is_image) {
            return 'fa-file-image-o text-info';
        }
        $ext = strtolower($this->file_type ?: pathinfo($this->pdf_file ?? '', PATHINFO_EXTENSION));
        if (in_array($ext, ['doc', 'docx'])) {
            return 'fa-file-word-o text-primary';
        }
        return 'fa-file-text-o text-secondary';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineSyllabus extends Model
{
    use HasFactory;

    protected $table = 'offline_syllabus';

    protected $fillable = [
        'title',
        'title_bn',
        'title_ar',
        'details',
        'details_bn',
        'details_ar',
        'document_one',
        'document_one_title',
        'document_two',
        'document_two_title',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get localized title based on active session language
     */
    public function getLocalizedTitleAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->title)) {
            return $this->title;
        }
        if ($lang === 'arabic' && !empty($this->title_ar)) {
            return $this->title_ar;
        }
        return $this->title_bn ?? $this->title;
    }

    /**
     * Get localized details based on active session language
     */
    public function getLocalizedDetailsAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->details)) {
            return $this->details;
        }
        if ($lang === 'arabic' && !empty($this->details_ar)) {
            return $this->details_ar;
        }
        return $this->details_bn ?? $this->details;
    }

    /**
     * Check if document 1 is a PDF
     */
    public function isDocOnePdf()
    {
        if (!$this->document_one) return false;
        return strtolower(pathinfo($this->document_one, PATHINFO_EXTENSION)) === 'pdf';
    }

    /**
     * Check if document 2 is a PDF
     */
    public function isDocTwoPdf()
    {
        if (!$this->document_two) return false;
        return strtolower(pathinfo($this->document_two, PATHINFO_EXTENSION)) === 'pdf';
    }

    /**
     * Get URL for document 1
     */
    public function getDocOneUrlAttribute()
    {
        return $this->document_one ? asset($this->document_one) : null;
    }

    /**
     * Get URL for document 2
     */
    public function getDocTwoUrlAttribute()
    {
        return $this->document_two ? asset($this->document_two) : null;
    }
}

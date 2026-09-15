<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'teacher_category_id',
        'name_bn',
        'name_en',
        'name_ar',
        'designation_bn',
        'designation_en',
        'designation_ar',
        'qualification_bn',
        'qualification_en',
        'subject_department_bn',
        'subject_department_en',
        'phone',
        'email',
        'bio_bn',
        'bio_en',
        'image',
        'nid_or_birth_certificate',
        'academic_certificate',
        'resume',
        'facebook',
        'youtube',
        'linkedin',
        'whatsapp',
        'experience',
        'joining_date',
        'is_featured',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'joining_date' => 'date',
        'is_featured'  => 'boolean',
        'status'       => 'integer',
        'sort_order'   => 'integer',
    ];

    /**
     * Relationship: A teacher belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(TeacherCategory::class, 'teacher_category_id');
    }

    /**
     * Display Name based on current session language.
     */
    public function getDisplayNameAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->name_en)) {
            return $this->name_en;
        } elseif ($lang === 'arabic' && !empty($this->name_ar)) {
            return $this->name_ar;
        }
        return $this->name_bn;
    }

    /**
     * Display Designation based on current session language.
     */
    public function getDisplayDesignationAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->designation_en)) {
            return $this->designation_en;
        } elseif ($lang === 'arabic' && !empty($this->designation_ar)) {
            return $this->designation_ar;
        }
        return $this->designation_bn;
    }

    /**
     * Display Qualification based on current session language.
     */
    public function getDisplayQualificationAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->qualification_en)) {
            return $this->qualification_en;
        }
        return $this->qualification_bn;
    }

    /**
     * Display Subject / Department based on current session language.
     */
    public function getDisplaySubjectAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->subject_department_en)) {
            return $this->subject_department_en;
        }
        return $this->subject_department_bn;
    }

    /**
     * Display Bio based on current session language.
     */
    public function getDisplayBioAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->bio_en)) {
            return $this->bio_en;
        }
        return $this->bio_bn;
    }

    /**
     * Status Badge HTML.
     */
    public function getStatusBadgeAttribute()
    {
        if ($this->status == 1) {
            return '<span class="badge bg-success text-white px-2 py-1">সক্রিয় (Active)</span>';
        }
        return '<span class="badge bg-danger text-white px-2 py-1">নিষ্ক্রিয় (Inactive)</span>';
    }

    /**
     * Helper to check if NID document is a PDF
     */
    public function isNidPdf()
    {
        if (!$this->nid_or_birth_certificate) return false;
        return strtolower(pathinfo($this->nid_or_birth_certificate, PATHINFO_EXTENSION)) === 'pdf';
    }

    /**
     * Helper to check if Academic Certificate is a PDF
     */
    public function isAcademicCertPdf()
    {
        if (!$this->academic_certificate) return false;
        return strtolower(pathinfo($this->academic_certificate, PATHINFO_EXTENSION)) === 'pdf';
    }

    /**
     * Helper to check if Resume/CV is a PDF
     */
    public function isResumePdf()
    {
        if (!$this->resume) return false;
        return strtolower(pathinfo($this->resume, PATHINFO_EXTENSION)) === 'pdf';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admissions';

    protected $guarded = ['id'];

    protected $casts = [
        'dob' => 'date',
        'admission_test_date' => 'date',
        'approval_date' => 'date',
        'doc_student_photos' => 'boolean',
        'doc_guardian_photos' => 'boolean',
        'doc_birth_certificate' => 'boolean',
        'doc_nid' => 'boolean',
        'doc_tc' => 'boolean',
        'marks_hifz_nazera' => 'float',
        'marks_tajweed' => 'float',
        'marks_pronunciation' => 'float',
        'marks_bangla' => 'float',
        'marks_english' => 'float',
        'marks_math' => 'float',
        'marks_general_knowledge' => 'float',
        'obtained_marks' => 'float',
        'percentage_marks' => 'float',
    ];

    /**
     * Generate unique application tracking number.
     * Format: MQHM-YEAR-4DIGIT (e.g. MQHM-2026-1001)
     */
    public static function generateApplicationNo()
    {
        $year = date('Y');
        $prefix = "MQHM-{$year}-";

        $latest = self::where('application_no', 'like', "{$prefix}%")
            ->orderBy('id', 'desc')
            ->first();

        if ($latest && preg_match('/MQHM-\d{4}-(\d+)/', $latest->application_no, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1001;
        }

        return $prefix . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Relationship: Admission has one enrolled Student record.
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'admission_id');
    }

    /**
     * Status badge styling and text helper.
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return '<span class="badge bg-warning text-dark px-3 py-2">অপেক্ষমান (Pending)</span>';
            case 'under_review':
                return '<span class="badge bg-info text-dark px-3 py-2">পর্যালোচনাধীন (Under Review)</span>';
            case 'test_scheduled':
                return '<span class="badge bg-primary px-3 py-2">পরীক্ষা নির্ধারিত (Test Scheduled)</span>';
            case 'passed':
                return '<span class="badge bg-info text-white px-3 py-2">উত্তীর্ণ (Passed)</span>';
            case 'approved':
                return '<span class="badge bg-success px-3 py-2">ভর্তি অনুমোদিত (Approved)</span>';
            case 'rejected':
                return '<span class="badge bg-danger px-3 py-2">বাতিল (Rejected)</span>';
            case 'completed':
                return '<span class="badge bg-secondary px-3 py-2">সম্পন্ন (Completed)</span>';
            default:
                return '<span class="badge bg-secondary px-3 py-2">' . ucfirst($this->status) . '</span>';
        }
    }

    /**
     * Get display name (prefer Bangla, fallback to English).
     */
    public function getDisplayNameAttribute()
    {
        return $this->student_name_bn ?: ($this->student_name_en ?: 'N/A');
    }

    /**
     * Calculate total marks automatically out of 200.
     */
    public function calculateTotalMarks()
    {
        $total = ($this->marks_hifz_nazera ?? 0)
            + ($this->marks_tajweed ?? 0)
            + ($this->marks_pronunciation ?? 0)
            + ($this->marks_bangla ?? 0)
            + ($this->marks_english ?? 0)
            + ($this->marks_math ?? 0)
            + ($this->marks_general_knowledge ?? 0);

        $this->obtained_marks = $total;
        $this->percentage_marks = round(($total / 200) * 100, 2);

        return $this;
    }
}

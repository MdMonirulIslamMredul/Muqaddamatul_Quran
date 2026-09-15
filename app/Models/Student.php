<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'student_class_id',
        'admission_id',
        'student_id_number',
        'academic_year',
        'roll_no',
        'student_name_bn',
        'student_name_en',
        'dob',
        'blood_group',
        'residential_type',
        'photo',
        'father_name_bn',
        'father_name_en',
        'father_contact',
        'father_profession',
        'mother_name_bn',
        'mother_name_en',
        'mother_contact',
        'guardian_name',
        'guardian_contact',
        'guardian_relation',
        'emergency_contact',
        'present_address',
        'permanent_address',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'dob'    => 'date',
        'status' => 'integer',
    ];

    /**
     * Relationship: Student belongs to a Class.
     */
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id');
    }

    /**
     * Relationship: Student belongs to an Admission record.
     */
    public function admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }

    /**
     * Display Name helper.
     */
    public function getDisplayNameAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->student_name_en)) {
            return $this->student_name_en;
        }
        return $this->student_name_bn;
    }

    /**
     * Residential Type in Bengali.
     */
    public function getResidentialTypeBnAttribute()
    {
        return match($this->residential_type) {
            'residential'     => 'আবাসিক',
            'non_residential' => 'অনাবাসিক',
            'day_care'        => 'ডে-কেয়ার',
            default           => $this->residential_type,
        };
    }

    /**
     * Status Badge HTML.
     */
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            1       => '<span class="badge bg-success text-white px-2 py-1">অধ্যয়নরত (Active)</span>',
            2       => '<span class="badge bg-primary text-white px-2 py-1">উত্তীর্ণ (Passed)</span>',
            3       => '<span class="badge bg-warning text-dark px-2 py-1">ছাড়পত্রপ্রাপ্ত (TC)</span>',
            default => '<span class="badge bg-danger text-white px-2 py-1">নিষ্ক্রিয় (Inactive)</span>',
        };
    }

    /**
     * Auto generate Student ID Number if not provided.
     */
    public static function generateStudentId($year = null)
    {
        $year = $year ?: date('Y');
        $lastStudent = self::where('academic_year', $year)->latest('id')->first();
        $nextNumber = 1;

        if ($lastStudent && !empty($lastStudent->student_id_number)) {
            $parts = explode('-', $lastStudent->student_id_number);
            if (isset($parts[2]) && is_numeric($parts[2])) {
                $nextNumber = (int)$parts[2] + 1;
            } else {
                $nextNumber = self::where('academic_year', $year)->count() + 1;
            }
        }

        return sprintf('MQ-%s-%04d', $year, $nextNumber);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'student_classes';

    protected $fillable = [
        'name_bn',
        'name_en',
        'code',
        'department',
        'monthly_fee',
        'admission_fee',
        'seat_capacity',
        'order_level',
        'description',
        'status',
    ];

    protected $casts = [
        'monthly_fee'   => 'decimal:2',
        'admission_fee' => 'decimal:2',
        'seat_capacity' => 'integer',
        'order_level'   => 'integer',
        'status'        => 'integer',
    ];

    /**
     * Relationship: Class has many students.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'student_class_id')
            ->orderByRaw('CAST(roll_no AS UNSIGNED) ASC')
            ->orderBy('id', 'asc');
    }

    /**
     * Active students in this class.
     */
    public function activeStudents()
    {
        return $this->hasMany(Student::class, 'student_class_id')
            ->where('status', 1)
            ->orderByRaw('CAST(roll_no AS UNSIGNED) ASC')
            ->orderBy('id', 'asc');
    }

    /**
     * Display Name helper based on session language.
     */
    public function getDisplayNameAttribute()
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->name_en)) {
            return $this->name_en;
        }
        return $this->name_bn;
    }

    /**
     * Auto-generate code/slug on creation if empty.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $base = !empty($model->name_en) ? $model->name_en : $model->name_bn;
                $model->code = Str::slug($base) ?: 'cls-' . uniqid();
            }
        });
    }
}

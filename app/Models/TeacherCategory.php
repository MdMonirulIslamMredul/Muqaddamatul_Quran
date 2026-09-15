<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeacherCategory extends Model
{
    use HasFactory;

    protected $table = 'teacher_categories';

    protected $fillable = [
        'name_bn',
        'name_en',
        'name_ar',
        'slug',
        'order_level',
        'description',
        'status',
    ];

    /**
     * Relationship: A category has many teachers.
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'teacher_category_id')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc');
    }

    /**
     * Active teachers in this category.
     */
    public function activeTeachers()
    {
        return $this->hasMany(Teacher::class, 'teacher_category_id')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc');
    }

    /**
     * Multi-language category name helper.
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
     * Boot helper to generate slug automatically if missing.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $base = !empty($model->name_en) ? $model->name_en : $model->name_bn;
                $model->slug = Str::slug($base) ?: 'cat-' . uniqid();
            }
        });
    }
}

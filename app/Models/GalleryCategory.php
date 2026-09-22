<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'gallery_categories';

    protected $fillable = [
        'name_bn',
        'name_en',
        'name_ar',
        'slug',
        'type',
        'order_level',
        'description',
        'status',
    ];

    /**
     * Relationship with Photo Galleries
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id')->latest();
    }

    /**
     * Active Photo Galleries
     */
    public function activeGalleries()
    {
        return $this->hasMany(Gallery::class, 'category_id')->where('status', 1)->latest();
    }

    /**
     * Relationship with Video Galleries
     */
    public function videoGalleries()
    {
        return $this->hasMany(VideoGallery::class, 'category_id')->latest();
    }

    /**
     * Active Video Galleries
     */
    public function activeVideoGalleries()
    {
        return $this->hasMany(VideoGallery::class, 'category_id')->where('status', 1)->latest();
    }

    /**
     * Scope for photo gallery categories (type = photo or both, active)
     */
    public function scopeForPhotos($query)
    {
        return $query->whereIn('type', ['photo', 'both'])->where('status', 1);
    }

    /**
     * Scope for video gallery categories (type = video or both, active)
     */
    public function scopeForVideos($query)
    {
        return $query->whereIn('type', ['video', 'both'])->where('status', 1);
    }

    /**
     * Multi-language display name accessor
     */
    public function getDisplayNameAttribute(): string
    {
        $lang = session()->get('language', 'bangla');
        if ($lang === 'english' && !empty($this->name_en)) {
            return $this->name_en;
        } elseif ($lang === 'arabic' && !empty($this->name_ar)) {
            return $this->name_ar;
        }
        return $this->name_bn ?: ($this->name_en ?: 'Category');
    }

    /**
     * Auto slug generation on save
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $base = !empty($model->name_en) ? $model->name_en : $model->name_bn;
                $slug = Str::slug($base) ?: 'cat-' . uniqid();
                $originalSlug = $slug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter++;
                }
                $model->slug = $slug;
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Relationship with GalleryCategory
     */
    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    /**
     * Check if this item is an uploaded raw video file
     */
    public function isRawVideo(): bool
    {
        return !empty($this->video_file);
    }

    /**
     * Get the video file extension formatted in uppercase (MP4, MKV, WMV, etc.)
     */
    public function getFileExtensionAttribute(): ?string
    {
        if ($this->video_file) {
            return strtoupper(pathinfo($this->video_file, PATHINFO_EXTENSION));
        }
        return null;
    }

    /**
     * Get thumbnail URL or fallback
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail && file_exists(public_path($this->thumbnail))) {
            return asset($this->thumbnail);
        }
        return null;
    }

    /**
     * Get video file URL
     */
    public function getVideoFileUrlAttribute(): ?string
    {
        if ($this->video_file && file_exists(public_path($this->video_file))) {
            return asset($this->video_file);
        }
        return null;
    }
}

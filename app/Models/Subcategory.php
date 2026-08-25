<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relationship With Audio
    public function audios()
    {
        return $this->hasMany(Audio::class);
    }
}

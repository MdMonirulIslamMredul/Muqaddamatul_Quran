<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Subcategory
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // Relationship With Audio
    public function audios()
    {
        return $this->hasMany(Audio::class);
    }
}

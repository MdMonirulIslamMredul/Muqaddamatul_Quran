<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Tvsubcategory
    public function tvSubcategories()
    {
        return $this->hasMany(Tvsubcategory::class, 'category_id', 'id');
    }

    // Relationship With Tv
    public function tvs()
    {
        return $this->hasMany(Tv::class);
    }
}

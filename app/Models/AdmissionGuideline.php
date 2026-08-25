<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionGuideline extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_title',
        'section_title_bn',
        'section_title_ab',

        'details',
        'details_bn',
        'details_ab',

        'process',
        'process_bn',
        'process_ab',

        'admission_fees',
        'admission_fees_bn',
        'admission_fees_ab',

        'monthly_fees',
        'monthly_fees_bn',
        'monthly_fees_ab',

        'others_fees',
        'others_fees_bn',
        'others_fees_ab',

        'payment_rules',
        'payment_rules_bn',
        'payment_rules_ab',

        'points',
        'points_bn',
        'points_ab',
    ];

    protected $casts = [
        'points'    => 'array',
        'points_bn' => 'array',
        'points_ab' => 'array',
    ];
}

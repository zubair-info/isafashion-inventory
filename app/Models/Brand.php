<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_brand()
    {
        return $this->belongsTo(Brand::class, 'brand_name');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnittingSendLekraBrand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function rel_to_lekra_brand()
    {
        return $this->belongsTo(LekraBrand::class, 'lekra_brand_id');
    }
}

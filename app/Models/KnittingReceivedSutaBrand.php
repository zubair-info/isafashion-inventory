<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnittingReceivedSutaBrand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_company()
    {
        return $this->belongsTo(CompanyName::class, 'company_id');
    }
    function rel_to_brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    function rel_to_suta()
    {
        return $this->belongsTo(Suta::class, 'suta_id');
    }
    function rel_to_kapor()
    {
        return $this->belongsTo(Kapor::class, 'kapor_id');
    }
}

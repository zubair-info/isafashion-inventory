<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakingKnittingSend extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_company()
    {
        return $this->belongsTo(CompanyName::class, 'send_company_name');
    }
    function rel_to_brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }
    function rel_to_suta()
    {
        return $this->belongsTo(Suta::class, 'name_of_suta');
    }
    function rel_to_kapor()
    {
        return $this->belongsTo(Kapor::class, 'kapor');
    }
}

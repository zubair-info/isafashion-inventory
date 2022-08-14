<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakingKnittingSend extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_kintting_send_suta_brand_id()
    {
        return $this->hasMany(KnittingSendSutaBrand::class, 'knitting_send_id');
    }

    function rel_to_kintting_send_lekra_brand_id()
    {
        return $this->hasMany(KnittingSendLekraBrand::class, 'knitting_send_id');
    }
    function rel_to_company()
    {
        return $this->belongsTo(CompanyName::class, 'company_id');
    }
}

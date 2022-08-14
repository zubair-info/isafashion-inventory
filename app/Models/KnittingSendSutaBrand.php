<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnittingSendSutaBrand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // function rel_to_send_id()
    // {
    //     return $this->belongsTo(MakingKnittingSend::class, 'id');
    // }
    function rel_to_brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    function rel_to_suta()
    {
        return $this->belongsTo(Suta::class,  'suta_id');
    }
    function rel_to_kapor()
    {
        return $this->belongsTo(Kapor::class, 'kapor_id');
    }
}

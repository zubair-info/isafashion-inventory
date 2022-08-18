<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakingDyeingSend extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function rel_to_company()
    {
        return $this->belongsTo(CompanyName::class, 'company_id');
    }
}

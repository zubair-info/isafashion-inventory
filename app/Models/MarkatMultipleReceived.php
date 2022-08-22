<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkatMultipleReceived extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function rel_to_kapor()
    {
        return $this->belongsTo(Kapor::class, 'kapor_id');
    }
}

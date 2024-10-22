<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'funding_agency',
        'agency_level',
        'co_pi_pi',
        'worth',
        'title',
        'start_date',
        'completion_date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPublication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'author',
        'title',
        'journal_name',
        'publishing_year',
        'journal_volume',
        'impact_factor',
        'doi_url',
        'journal_type',
        'hec_recognized',
        'hrjs_category'
    ];

    

}

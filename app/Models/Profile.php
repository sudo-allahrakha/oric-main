<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'academic_title',
        'subject',
        'specialization',
        'research_area',
        'nationality',
        'researcher_id',
        'orcid_id',
        'google_scholar_link',
        'contact',
        'biosketch',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

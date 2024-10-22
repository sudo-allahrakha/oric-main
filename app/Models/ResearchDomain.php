<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchDomain extends Model
{
    use HasFactory;
    protected $fillable = ['research_area', 'keywords', 'targeted_sdg', 'user_id'];

    protected $casts = [
        'keywords' => 'array', // Convert JSON to array
        'targeted_sdg' => 'array', // Convert JSON to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

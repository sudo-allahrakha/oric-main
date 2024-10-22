<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    use HasFactory;
    protected $fillable = [
        'patent_title',
        'patent_number',
        'inventors_name',
        'patent_status',
        'abstract'
    ];

    // Relationship to the User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

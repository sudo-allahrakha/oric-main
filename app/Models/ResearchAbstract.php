<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchAbstract extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name_of_conference',
        'date',
        'page_no',
        'publication_type',
        'category',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

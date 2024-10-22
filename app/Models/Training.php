<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'organizer', 'title', 'year', 'institute', 'training_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

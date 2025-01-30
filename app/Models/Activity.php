<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'duration',
        'calories_burned',
        'distance',
        'steps',
        'activity_type',
    ];
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

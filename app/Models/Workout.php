<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workout extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'exercise_name',
        'sets',
        'reps',
        'weight',
        'rest_period',
        'rpe',
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

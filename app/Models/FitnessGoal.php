<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FitnessGoal extends Model
{
    protected $fillable = [
        'user_id',
        'goal_type',
        'target_weight',
        'target_calories',
        'target_steps',
        'target_distance',
        'target_duration',
    ];
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

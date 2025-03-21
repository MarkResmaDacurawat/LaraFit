<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model {

    protected $fillable = [
        'user_id',
        'goal_type',
        'target_value',
        'unit',
        'deadline',
        'notes',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

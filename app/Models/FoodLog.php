<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodLog extends Model
{
    protected $fillable = ['user_id', 'date', 'food_name', 'quantity', 'calories', 'carbs', 'protein', 'fats'];

    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'exercise_name' => 'required|string|max:255',
            'sets' => 'required|integer|min:1',
            'reps' => 'required|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
            'rest_period' => 'nullable|integer|min:0',
            'rpe' => 'nullable|integer|min:1|max:10',
        ];
    }
    
}

@extends('layouts.layout')

@section('title', 'Edit Goal')

@section('content')
    <div class="pb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Edit Your Goal</h1>

        <x-form action="{{ route('goals.update', $goal) }}" method="PATCH">
            <x-select label="Goal Type" name="goal_type">
                <option value="Weight Loss" {{ $goal->goal_type == 'Weight Loss' ? 'selected' : '' }}>Weight Loss</option>
                <option value="Muscle Gain" {{ $goal->goal_type == 'Muscle Gain' ? 'selected' : '' }}>Muscle Gain</option>
                <option value="Endurance" {{ $goal->goal_type == 'Endurance' ? 'selected' : '' }}>Endurance</option>
                <option value="Strength" {{ $goal->goal_type == 'Strength' ? 'selected' : '' }}>Strength</option>
            </x-select>

            <x-input label="Target Value" type="number" name="target_value" :value="$goal->target_value" required />
            <x-input label="Unit" type="text" name="unit" :value="$goal->unit" required />
            <x-input label="Deadline" type="date" name="deadline" :value="$goal->deadline" />
            <x-textarea label="Notes" name="notes">{{ $goal->notes }}</x-textarea>

            <x-button text="Update Goal" />
        </x-form>
    </div>
@endsection

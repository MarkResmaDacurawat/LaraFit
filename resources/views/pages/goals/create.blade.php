@extends('layouts.layout')

@section('title', 'Set A Goal')

@section('content')
    <div class="pb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Set Your Fitness Goal</h1>

        <x-form action="{{ route('goals.store') }}" method="POST">
            <x-select label="Goal Type" name="goal_type">
                <option value="Weight Loss">Weight Loss</option>
                <option value="Muscle Gain">Muscle Gain</option>
                <option value="Endurance">Endurance</option>
                <option value="Strength">Strength</option>
            </x-select>

            <x-input label="Target Value" type="number" name="target_value" :value="old('target_value')" required />
            <x-input label="Unit (kg, reps, minutes)" type="text" name="unit" :value="old('unit')" required />
            <x-input label="Deadline (Optional)" type="date" name="deadline" :value="old('deadline')" />
            <x-textarea label="Notes (Optional)" name="notes">{{ old('notes') }}</x-textarea>

            <x-button text="Set Goal" />
        </x-form>
    </div>
@endsection

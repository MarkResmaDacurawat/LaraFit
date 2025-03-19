@extends('layouts.layout')

@section('title', 'Add A Workout')

@section('content')
    <div class="pb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Log Your Workout</h1>

        <form action="{{ route('workouts.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
            @csrf

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-500 text-white rounded-md">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Fields -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input label="Date" type="date" name="date" :value="old('date')" required />
                <x-input label="Exercise Name" type="text" name="exercise_name" :value="old('exercise_name')" required />
                <x-input label="Sets" type="number" name="sets" :value="old('sets')" required />
                <x-input label="Reps per Set" type="number" name="reps" :value="old('reps')" required />
                <x-input label="Weight (kg)" type="number" name="weight" :value="old('weight')" required />
                <x-input label="Rest Period (seconds)" type="number" name="rest_period" :value="old('rest_period')" />
                <x-input label="RPE (1-10)" type="number" name="rpe" :value="old('rpe')" min="1" max="10" />
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-lg font-medium transition">
                    Log Workout
                </button>
            </div>
        </form>
    </div>
@endsection

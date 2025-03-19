@extends('layouts.layout')

@section('title', 'Edit Workout')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Edit Your Workout</h1>

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
            <strong>Oops! Something went wrong.</strong>
            <ul class="mt-2">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workouts.update', $workout->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label for="date" class="text-gray-700 font-medium">Date</label>
                <input type="date" name="date" id="date" value="{{ $workout->date }}" 
                    class="input-field" required>
            </div>

            <div class="flex flex-col">
                <label for="exercise_name" class="text-gray-700 font-medium">Exercise Name</label>
                <input type="text" name="exercise_name" id="exercise_name" value="{{ $workout->exercise_name }}" 
                    class="input-field" required>
            </div>

            <div class="flex flex-col">
                <label for="sets" class="text-gray-700 font-medium">Sets</label>
                <input type="number" name="sets" id="sets" value="{{ $workout->sets }}" 
                    class="input-field" required>
            </div>

            <div class="flex flex-col">
                <label for="reps" class="text-gray-700 font-medium">Reps per Set</label>
                <input type="number" name="reps" id="reps" value="{{ $workout->reps }}" 
                    class="input-field" required>
            </div>

            <div class="flex flex-col">
                <label for="weight" class="text-gray-700 font-medium">Weight (kg)</label>
                <input type="number" name="weight" id="weight" value="{{ $workout->weight }}" 
                    class="input-field" required>
            </div>

            <div class="flex flex-col">
                <label for="rest_period" class="text-gray-700 font-medium">Rest Period (seconds)</label>
                <input type="number" name="rest_period" id="rest_period" value="{{ $workout->rest_period }}" 
                    class="input-field">
            </div>

            <div class="flex flex-col">
                <label for="rpe" class="text-gray-700 font-medium">RPE (1-10)</label>
                <input type="number" name="rpe" id="rpe" value="{{ $workout->rpe }}" 
                    class="input-field" min="1" max="10">
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="w-full sm:w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow-md transition">
                Update Workout
            </button>
        </div>
    </form>
</div>

<style>
    .input-field {
        @apply border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500;
    }
</style>
@endsection

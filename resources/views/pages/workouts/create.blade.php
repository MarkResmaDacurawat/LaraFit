@extends('layouts.layout')

@section('title', 'Add A Workout')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 font-semibold text-center">Log Your Workout Here!</h1>
        <form action="{{ route('workouts.store') }}" method="POST" class="mx-auto w-full max-w-[600px] p-4 rounded-lg">
            @csrf

            <!-- Error Messages -->
            @if($errors->any())
                <div class="my-4 p-6 bg-red-400 rounded-sm">
                    @foreach($errors->all() as $error)
                        <ul>
                            <li class="text-white mb-2">{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif

            <!-- Form Grid (Two Columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Date -->
                <div class="flex flex-col">
                    <label for="date" class="text-gray-800 text-md">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Exercise Name -->
                <div class="flex flex-col">
                    <label for="exercise_name" class="text-gray-800 text-md">Exercise Name</label>
                    <input type="text" name="exercise_name" id="exercise_name" value="{{ old('exercise_name') }}" class="border-2 border-gray-300 rounded-md p-2" required>
                </div>

                <!-- Sets -->
                <div class="flex flex-col">
                    <label for="sets" class="text-gray-800 text-md">Sets</label>
                    <input type="number" name="sets" id="sets" value="{{ old('sets') }}" class="border-2 border-gray-300 rounded-md p-2" required>
                </div>

                <!-- Reps -->
                <div class="flex flex-col">
                    <label for="reps" class="text-gray-800 text-md">Reps per Set</label>
                    <input type="number" name="reps" id="reps" value="{{ old('reps') }}" class="border-2 border-gray-300 rounded-md p-2" required>
                </div>

                <!-- Weight -->
                <div class="flex flex-col">
                    <label for="weight" class="text-gray-800 text-md">Weight (kg)</label>
                    <input type="number" name="weight" id="weight" value="{{ old('weight') }}" class="border-2 border-gray-300 rounded-md p-2" required>
                </div>

                <!-- Rest Period -->
                <div class="flex flex-col">
                    <label for="rest_period" class="text-gray-800 text-md">Rest Period (seconds)</label>
                    <input type="number" name="rest_period" id="rest_period" value="{{ old('rest_period') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Rate of Perceived Effort (RPE) -->
                <div class="flex flex-col">
                    <label for="rpe" class="text-gray-800 text-md">RPE (1-10)</label>
                    <input type="number" name="rpe" id="rpe" value="{{ old('rpe') }}" class="border-2 border-gray-300 rounded-md p-2" min="1" max="10">
                </div>
            </div>

            <!-- Submit Button (Full Width) -->
            <div class="flex justify-center mt-4">
                <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">Log Workout</button>
            </div>
        </form>
    </div>
@endsection

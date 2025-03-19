@extends('layouts.layout')

@section('title', 'Add Activity')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Log Your Activity</h1>

    <!-- Error Messages -->
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

    <!-- Activity Form -->
    <form action="{{ route('activities.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Date -->
            <div class="flex flex-col">
                <label for="date" class="text-gray-700 font-medium">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}" required class="input-field">
            </div>

            <!-- Duration -->
            <div class="flex flex-col">
                <label for="duration" class="text-gray-700 font-medium">Duration (minutes)</label>
                <input type="number" name="duration" id="duration" value="{{ old('duration') }}" required class="input-field">
            </div>

            <!-- Calories Burned -->
            <div class="flex flex-col">
                <label for="calories_burned" class="text-gray-700 font-medium">Calories Burned</label>
                <input type="number" name="calories_burned" id="calories_burned" value="{{ old('calories_burned') }}" class="input-field">
            </div>

            <!-- Distance -->
            <div class="flex flex-col">
                <label for="distance" class="text-gray-700 font-medium">Distance (km)</label>
                <input type="number" name="distance" id="distance" value="{{ old('distance') }}" step="0.01" class="input-field">
            </div>

            <!-- Activity Type -->
            <div class="flex flex-col sm:col-span-2">
                <label for="activity_type" class="text-gray-700 font-medium">Activity Type</label>
                <select name="activity_type" id="activity_type" required class="input-field">
                    <option value="running">Running</option>
                    <option value="walking">Walking</option>
                    <option value="cycling">Cycling</option>
                    <option value="swimming">Swimming</option>
                    <option value="gym">Gym Workout</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="w-full sm:w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow-md transition">
                Log Activity
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

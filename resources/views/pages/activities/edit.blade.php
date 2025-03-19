@extends('layouts.layout')

@section('title', 'Edit Activity')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Edit Your Activity</h1>

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

    <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label for="date" class="text-gray-700 font-medium">Date</label>
                <input type="date" name="date" value="{{ $activity->date }}" required 
                    class="input-field">
            </div>

            <div class="flex flex-col">
                <label for="duration" class="text-gray-700 font-medium">Duration (minutes)</label>
                <input type="number" name="duration" value="{{ $activity->duration }}" required 
                    class="input-field">
            </div>

            <div class="flex flex-col">
                <label for="calories_burned" class="text-gray-700 font-medium">Calories Burned</label>
                <input type="number" name="calories_burned" value="{{ $activity->calories_burned }}" 
                    class="input-field">
            </div>

            <div class="flex flex-col">
                <label for="distance" class="text-gray-700 font-medium">Distance (km)</label>
                <input type="number" name="distance" value="{{ $activity->distance }}" step="0.01" 
                    class="input-field">
            </div>

            <div class="flex flex-col sm:col-span-2">
                <label for="activity_type" class="text-gray-700 font-medium">Activity Type</label>
                <select name="activity_type" required class="input-field">
                    <option value="running" {{ $activity->activity_type == 'running' ? 'selected' : '' }}>Running</option>
                    <option value="walking" {{ $activity->activity_type == 'walking' ? 'selected' : '' }}>Walking</option>
                    <option value="cycling" {{ $activity->activity_type == 'cycling' ? 'selected' : '' }}>Cycling</option>
                    <option value="swimming" {{ $activity->activity_type == 'swimming' ? 'selected' : '' }}>Swimming</option>
                    <option value="gym" {{ $activity->activity_type == 'gym' ? 'selected' : '' }}>Gym Workout</option>
                </select>
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="w-full sm:w-1/2 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow-md transition">
                Update Activity
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

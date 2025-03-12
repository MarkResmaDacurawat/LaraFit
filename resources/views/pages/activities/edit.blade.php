@extends('layouts.layout')

@section('title', 'Edit Activity')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 font-semibold text-center">Edit Your Activity</h1>
        <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="mx-auto w-full max-w-[500px] p-4 rounded-lg">
            @csrf
            @method('PUT')

            <label for="date">Date:</label>
            <input type="date" name="date" value="{{ $activity->date }}" required class="border rounded p-2 w-full">

            <label for="duration">Duration (minutes):</label>
            <input type="number" name="duration" value="{{ $activity->duration }}" required class="border rounded p-2 w-full">
            
            <label for="calories_burned">Calories Burned:</label>
            <input type="number" name="calories_burned" value="{{ $activity->calories_burned }}" class="border rounded p-2 w-full">
            
            <label for="distance">Distance (km):</label>
            <input type="number" name="distance" value="{{ $activity->distance }}" step="0.01" class="border rounded p-2 w-full">

            <label for="activity_type">Activity Type:</label>
            <select name="activity_type" required class="border rounded p-2 w-full">
                <option value="running" {{ $activity->activity_type == 'running' ? 'selected' : '' }}>Running</option>
                <option value="walking" {{ $activity->activity_type == 'walking' ? 'selected' : '' }}>Walking</option>
                <option value="cycling" {{ $activity->activity_type == 'cycling' ? 'selected' : '' }}>Cycling</option>
                <option value="swimming" {{ $activity->activity_type == 'swimming' ? 'selected' : '' }}>Swimming</option>
                <option value="gym" {{ $activity->activity_type == 'gym' ? 'selected' : '' }}>Gym Workout</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-4 w-full">Update Activity</button>
        </form>
    </div>
@endsection

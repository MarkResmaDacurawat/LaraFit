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

    <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="Date" name="date" type="date" value="{{ $activity->date }}" required />
            <x-input label="Duration (minutes)" name="duration" type="number" value="{{ $activity->duration }}" required />
            <x-input label="Calories Burned" name="calories_burned" type="number" value="{{ $activity->calories_burned }}" />
            <x-input label="Distance (km)" name="distance" type="number" value="{{ $activity->distance }}" step="0.01" />
            <x-select label="Activity Type" name="activity_type" required>
                <option value="running" {{ $activity->activity_type == 'running' ? 'selected' : '' }}>Running</option>
                <option value="walking" {{ $activity->activity_type == 'walking' ? 'selected' : '' }}>Walking</option>
                <option value="cycling" {{ $activity->activity_type == 'cycling' ? 'selected' : '' }}>Cycling</option>
                <option value="swimming" {{ $activity->activity_type == 'swimming' ? 'selected' : '' }}>Swimming</option>
                <option value="gym" {{ $activity->activity_type == 'gym' ? 'selected' : '' }}>Gym Workout</option>
            </x-select>
        </div>

        <div class="flex justify-center mt-6">
            <x-button text="Update Activity" class="w-full sm:w-1/2" />
        </div>
    </form>
</div>
@endsection

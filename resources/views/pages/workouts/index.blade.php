@extends('layouts.layout')

@section('title', 'Workout Logs')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">Your Workout Logs</h1>
        <a href="{{ route('workouts.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">
            + Add Workout
        </a>
    </div>

    @if($workouts->isEmpty())
        <p class="text-center text-gray-600 text-lg">No workouts logged yet. Start tracking your progress!</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($workouts as $workout)
                <div class="border-l-4 border-blue-600 bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $workout->exercise_name }}</h2>
                    <div class="mt-3 space-y-2 text-gray-700">
                        <p><strong>Date:</strong> {{ $workout->date }}</p>
                        <p><strong>Sets:</strong> {{ $workout->sets }}</p>
                        <p><strong>Reps:</strong> {{ $workout->reps }}</p>
                        <p><strong>Weight:</strong> {{ $workout->weight }} kg</p>
                        <p><strong>Rest Period:</strong> {{ $workout->rest_period }} sec</p>
                        <p><strong>RPE:</strong> {{ $workout->rpe ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('workouts.edit', $workout->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Edit
                        </a>
                        <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

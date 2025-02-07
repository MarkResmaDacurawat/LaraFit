@extends('layouts.layout')

@section('title', 'Workout Logs')

@section('content')
    <div class="pb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Your Workout Logs!</h1>
            <div>
                <a href="{{ route('workouts.create') }}" class="text-blue-600 underline">Add Workout</a>
            </div>
        </div>
        @if($workouts->isEmpty())
            <h1 class="text-center">No Workouts</h1>
        @endif
        <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-4">
            @foreach($workouts as $workout)
                <x-card title="{{ $workout->exercise_name }} Workout">
                    <div>
                        <p>Date: {{ $workout->date }}</p>
                        <p>Exercise: {{ $workout->exercise_name }}</p>
                        <p>Sets: {{ $workout->sets }}</p>
                        <p>Reps per Set: {{ $workout->reps }}</p>
                        <p>Weight: {{ $workout->weight }} kg</p>
                        <p>Rest Period: {{ $workout->rest_period }} seconds</p>
                        <p>RPE: {{ $workout->rpe ?? 'N/A' }}</p>
                    </div>
                    {{-- Delete Button --}}
                    <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 mt-4">Delete</button>
                    </form>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

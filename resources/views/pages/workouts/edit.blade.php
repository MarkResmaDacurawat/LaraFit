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
            <x-input label="Date" name="date" type="date" value="{{ $workout->date }}" required />
            <x-input label="Exercise Name" name="exercise_name" type="text" value="{{ $workout->exercise_name }}" required />
            <x-input label="Sets" name="sets" type="number" value="{{ $workout->sets }}" required />
            <x-input label="Reps per Set" name="reps" type="number" value="{{ $workout->reps }}" required />
            <x-input label="Weight (kg)" name="weight" type="number" value="{{ $workout->weight }}" required />
            <x-input label="Rest Period (seconds)" name="rest_period" type="number" value="{{ $workout->rest_period }}" />
            <x-input label="RPE (1-10)" name="rpe" type="number" value="{{ $workout->rpe }}" min="1" max="10" />
        </div>

        <div class="flex justify-center mt-6">
            <x-button text="Update Workout" class="w-full sm:w-1/2" />
        </div>
    </form>
</div>
@endsection

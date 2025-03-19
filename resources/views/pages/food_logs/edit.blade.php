@extends('layouts.layout')

@section('title', 'Edit Food Log')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Edit Your Food Log</h1>

    <form action="{{ route('food_logs.update', $foodLog->id) }}" method="POST" class="bg-white shadow-md p-6 rounded-lg border border-gray-200">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="Date" name="date" type="date" :value="$foodLog->date" required />
            <x-input label="Food Name" name="food_name" :value="$foodLog->food_name" required />
            <x-input label="Quantity (g)" name="quantity" type="number" :value="$foodLog->quantity" required min="1" />
            <x-input label="Calories" name="calories" type="number" :value="$foodLog->calories" required min="0" />
            <x-input label="Carbs (g)" name="carbs" type="number" :value="$foodLog->carbs" min="0" />
            <x-input label="Protein (g)" name="protein" type="number" :value="$foodLog->protein" min="0" />
            <x-input label="Fats (g)" name="fats" type="number" :value="$foodLog->fats" min="0" />
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                Update Food Log
            </button>
        </div>
    </form>
</div>
@endsection

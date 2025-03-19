@extends('layouts.layout')

@section('title', 'Add Food Log')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Log Your Food Here!</h1>

    <form action="{{ route('food_logs.store') }}" method="POST" class="bg-white shadow-md p-6 rounded-lg border border-gray-200">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="Date" name="date" type="date" required />
            <x-input label="Food Name" name="food_name" required />
            <x-input label="Quantity (g)" name="quantity" type="number" required min="1" />
            <x-input label="Calories" name="calories" type="number" required min="0" />
            <x-input label="Carbs (g)" name="carbs" type="number" min="0" />
            <x-input label="Protein (g)" name="protein" type="number" min="0" />
            <x-input label="Fats (g)" name="fats" type="number" min="0" />
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                Log Food
            </button>
        </div>
    </form>
</div>
@endsection

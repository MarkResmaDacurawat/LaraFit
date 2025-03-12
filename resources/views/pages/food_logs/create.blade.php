@extends('layouts.layout')

@section('title', 'Add Food Log')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 font-semibold text-center">Log Your Food Here!</h1>
        <form action="{{ route('food_logs.store') }}" method="POST" class="mx-auto w-full max-w-[600px] p-4 rounded-lg">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="date" class="text-gray-800 text-md">Date</label>
                    <input type="date" name="date" id="date" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="food_name" class="text-gray-800 text-md">Food Name</label>
                    <input type="text" name="food_name" id="food_name" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="quantity" class="text-gray-800 text-md">Quantity (g)</label>
                    <input type="number" name="quantity" id="quantity" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="calories" class="text-gray-800 text-md">Calories</label>
                    <input type="number" name="calories" id="calories" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="carbs" class="text-gray-800 text-md">Carbs (g)</label>
                    <input type="number" name="carbs" id="carbs" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="protein" class="text-gray-800 text-md">Protein (g)</label>
                    <input type="number" name="protein" id="protein" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col">
                    <label for="fats" class="text-gray-800 text-md">Fats (g)</label>
                    <input type="number" name="fats" id="fats" class="border-2 border-gray-300 rounded-md p-2">
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">Log Food</button>
            </div>
        </form>
    </div>
@endsection

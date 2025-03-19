@extends('layouts.layout')

@section('title', 'Food Logs')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">Your Food Logs</h1>
        <a href="{{ route('food_logs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">
            + Add Food Log
        </a>
    </div>

    @if($foodLogs->isEmpty())
        <p class="text-center text-gray-600 text-lg">No food logs recorded yet. Start tracking your nutrition!</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($foodLogs as $foodLog)
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-blue-500 transition hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $foodLog->food_name }}</h2>
                    <div class="mt-3 space-y-2 text-gray-700">
                        <p><strong>Date:</strong> {{ $foodLog->date }}</p>
                        <p><strong>Quantity:</strong> {{ $foodLog->quantity }}</p>
                        <p><strong>Calories:</strong> {{ $foodLog->calories }} kcal</p>
                        <p><strong>Carbs:</strong> {{ $foodLog->carbs ?? 'N/A' }}g</p>
                        <p><strong>Protein:</strong> {{ $foodLog->protein ?? 'N/A' }}g</p>
                        <p><strong>Fats:</strong> {{ $foodLog->fats ?? 'N/A' }}g</p>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('food_logs.edit', $foodLog->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Edit
                        </a>
                        <form action="{{ route('food_logs.destroy', $foodLog->id) }}" method="POST">
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

@extends('layouts.layout')

@section('title', 'Food Logs')

@section('content')
    <div class="pb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Your Food Logs!</h1>
            <div>
                <a href="{{ route('food_logs.create') }}" class="text-blue-600 underline">Add Food Log</a>
            </div>
        </div>
        @if($foodLogs->isEmpty())
            <h1 class="text-center">No Food Logs</h1>
        @endif
        <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-4">
            @foreach($foodLogs as $foodLog)
                <x-card title="{{ $foodLog->food_name }}">
                    <div>
                        <p>Date: {{ $foodLog->date }}</p>
                        <p>Quantity: {{ $foodLog->quantity }}</p>
                        <p>Calories: {{ $foodLog->calories }}g</p>
                        <p>Carbs: {{ $foodLog->carbs ?? 'N/A' }}g</p>
                        <p>Protein: {{ $foodLog->protein ?? 'N/A' }}g</p>
                        <p>Fats: {{ $foodLog->fats ?? 'N/A' }}g</p>
                    </div>
                    <a href="{{ route('food_logs.edit', $foodLog->id) }}" class="text-blue-500 hover:text-blue-700 mt-4">Edit</a>
                    <form action="{{ route('food_logs.destroy', $foodLog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 mt-2">Delete</button>
                    </form>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

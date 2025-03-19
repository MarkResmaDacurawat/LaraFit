@extends('layouts.layout')

@section('title', 'Your Goals')

@section('content')
    <div class="pb-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-semibold text-gray-800">Your Goals</h1>
            <a href="{{ route('goals.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">+ Add Goal</a>
        </div>

        @if($goals->isEmpty())
            <p class="text-center text-gray-500 text-lg">No goals set yet. Start your fitness journey now!</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($goals as $goal)
                    <div class="bg-white shadow-lg rounded-lg p-4 border-l-4 border-blue-600">
                        <h2 class="text-xl font-semibold text-gray-700">{{ $goal->goal_type }}</h2>
                        <p class="text-gray-600"><strong>Target:</strong> {{ $goal->target_value }} {{ $goal->unit }}</p>
                        <p class="text-gray-600"><strong>Deadline:</strong> {{ $goal->deadline ?? 'No Deadline' }}</p>
                        <p class="text-gray-600"><strong>Notes:</strong> {{ $goal->notes ?: 'No Notes' }}</p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('goals.edit', $goal) }}" class="text-blue-500 hover:text-blue-700 text-sm">Edit</a>
                            <form action="{{ route('goals.destroy', $goal) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-md">
                                    Goal Achieved
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@extends('layouts.layout')

@section('title', 'Your Goals')

@section('content')
    <div class="pb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Your Fitness Goals!</h1>
            <a href="{{ route('goals.create') }}" class="text-blue-600 underline">Add Goal</a>
        </div>

        @if($goals->isEmpty())
            <h1 class="text-center">No Goals Set</h1>
        @endif

        <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-4">
            @foreach($goals as $goal)
                <x-card title="{{ $goal->goal_type }}">
                    <div>
                        <p>Target: {{ $goal->target_value }} {{ $goal->unit }}</p>
                        <p>Deadline: {{ $goal->deadline ?? 'No Deadline' }}</p>
                        <p>Notes: {{ $goal->notes }}</p>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <!-- Edit Button -->
                        <a href="{{ route('goals.edit', $goal) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                        <form action="{{ route('goals.destroy', $goal) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white py-1 px-2 rounded-sm">Goal Achieved</button>
                        </form>
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

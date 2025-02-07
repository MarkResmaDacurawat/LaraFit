@extends('layouts.layout')

@section('title', 'Activity Logs')

@section('content')
    <div class="pb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Your Activities!</h1>
            <div>
                <a href="{{ route('activities.create') }}" class="text-blue-600 underline">Add Activity</a>
            </div>
        </div>
        @if($activities->isEmpty())
            <h1 class="text-center">No Activities</h1>
        @endif
        <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-4">
            @foreach($activities as $activity)
                <x-card title="{{ $activity->activity_type }} Activity">
                    <div>
                        <p>Date: {{ $activity->date }}</p>
                        <p>Duration: {{ $activity->duration }} minutes</p>
                        <p>Calories Burned: {{ $activity->calories_burned }}</p>
                        <p>Distance: {{ $activity->distance }} km</p>
                        <p>Activity Type: {{ $activity->activity_type }}</p>
                    </div>
                    {{-- Delete Button --}}
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 mt-4">Delete</button>
                    </form>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.layout')

@section('title', 'Activity Logs')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">Your Activities</h1>
        <a href="{{ route('activities.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">
            + Add Activity
        </a>
    </div>

    @if($activities->isEmpty())
        <p class="text-center text-gray-600 text-lg">No activities logged yet. Start tracking your progress!</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($activities as $activity)
                <div class="border-l-4 border-blue-600 bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-semibold text-gray-900 capitalize">{{ $activity->activity_type }}</h2>
                    <div class="mt-3 space-y-2 text-gray-700">
                        <p><strong>Date:</strong> {{ $activity->date }}</p>
                        <p><strong>Duration:</strong> {{ $activity->duration }} minutes</p>
                        <p><strong>Calories Burned:</strong> {{ $activity->calories_burned }}</p>
                        <p><strong>Distance:</strong> {{ $activity->distance }} km</p>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('activities.edit', $activity->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Edit
                        </a>
                        <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
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

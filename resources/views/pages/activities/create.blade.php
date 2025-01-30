@extends('layouts.layout')

@section('title', 'Add AActivity')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 mb-4 font-semibold text-center">Log Your Activity Here!</h1>
        <form action="" method="POST" class="mx-auto w-full max-w-[500px] p-4 rounded-lg">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <!-- Date -->
                <div class="flex flex-col">
                    <label for="date" class="text-gray-800 text-md">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                
                <!-- Duration -->
                <div class="flex flex-col">
                    <label for="duration" class="text-gray-800 text-md">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                
                <!-- Calories Burned -->
                <div class="flex flex-col">
                    <label for="calories_burned" class="text-gray-800 text-md">Calories Burned</label>
                    <input type="number" name="calories_burned" id="calories_burned" value="{{ old('calories_burned') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                
                <!-- Distance -->
                <div class="flex flex-col">
                    <label for="distance" class="text-gray-800 text-md">Distance (km)</label>
                    <input type="number" name="distance" id="distance" value="{{ old('distance') }}" step="0.01" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Activity Type -->
                <div class="flex flex-col">
                    <label for="activity_type" class="text-gray-800 text-md">Activity Type</label>
                    <select name="activity_type" id="activity_type" class="border-2 border-gray-300 rounded-md p-2">
                        <option value="running">Running</option>
                        <option value="walking">Walking</option>
                        <option value="cycling">Cycling</option>
                        <option value="swimming">Swimming</option>
                        <option value="gym">Gym Workout</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">Log Activity</button>
                </div>
            </div>
        </form>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mt-4 p-6 bg-red-400 rounded-sm">
                @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-white mb-2">{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
            <div class="mt-4 p-6 bg-green-400 rounded-sm">
                <p class="text-white">{{ session('success') }}</p>
            </div>
        @endif
    </div>
@endsection

@extends('layouts.layout')

@section('title', 'Set A Goal')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 font-semibold text-center">Set Your Fitness Goal</h1>
        <form action="{{ route('goals.store') }}" method="POST" class="mx-auto w-full max-w-[600px] p-4 rounded-lg">
            @csrf
            @if($errors->any())
                <div class="my-4 p-6 bg-red-400 rounded-sm">
                    @foreach($errors->all() as $error)
                        <ul><li class="text-white mb-2">{{ $error }}</li></ul>
                    @endforeach
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Goal Type -->
                <div class="flex flex-col">
                    <label for="goal_type" class="text-gray-800 text-md">Goal Type</label>
                    <select name="goal_type" id="goal_type" class="border-2 border-gray-300 rounded-md p-2">
                        <option value="Weight Loss">Weight Loss</option>
                        <option value="Muscle Gain">Muscle Gain</option>
                        <option value="Endurance">Endurance</option>
                        <option value="Strength">Strength</option>
                    </select>
                </div>

                <!-- Target Value -->
                <div class="flex flex-col">
                    <label for="target_value" class="text-gray-800 text-md">Target Value</label>
                    <input type="number" name="target_value" id="target_value" value="{{ old('target_value') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Unit -->
                <div class="flex flex-col">
                    <label for="unit" class="text-gray-800 text-md">Unit (kg, reps, minutes)</label>
                    <input type="text" name="unit" id="unit" value="{{ old('unit') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Deadline -->
                <div class="flex flex-col">
                    <label for="deadline" class="text-gray-800 text-md">Deadline (Optional)</label>
                    <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>

                <!-- Notes -->
                <div class="flex flex-col sm:col-span-2">
                    <label for="notes" class="text-gray-800 text-md">Notes (Optional)</label>
                    <textarea name="notes" id="notes" class="border-2 border-gray-300 rounded-md p-2">{{ old('notes') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center sm:col-span-2">
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">Set Goal</button>
                </div>
            </div>
        </form>
    </div>
@endsection

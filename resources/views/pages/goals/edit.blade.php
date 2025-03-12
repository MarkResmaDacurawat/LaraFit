@extends('layouts.layout')

@section('title', 'Edit Goal')

@section('content')
    <div class="pb-4">
        <h1 class="text-2xl sm:text-3xl text-gray-700 font-semibold text-center">Edit Your Goal</h1>

        <form action="{{ route('goals.update', $goal) }}" method="POST" class="mx-auto w-full max-w-[500px] p-4 rounded-lg">
            @csrf
            @method('PATCH')

            <div class="flex flex-col">
                <label for="goal_type" class="text-gray-800 text-md">Goal Type</label>
                <select name="goal_type" id="goal_type" class="border-2 border-gray-300 rounded-md p-2">
                    <option value="Weight Loss">Weight Loss</option>
                    <option value="Muscle Gain">Muscle Gain</option>
                    <option value="Endurance">Endurance</option>
                    <option value="Strength">Strength</option>
                </select>
            </div>

            <div class="flex flex-col mt-2">
                <label for="target_value" class="text-gray-800 text-md">Target Value</label>
                <input type="number" name="target_value" id="target_value" value="{{ old('target_value', $goal->target_value) }}" class="border-2 border-gray-300 rounded-md p-2">
            </div>

            <div class="flex flex-col mt-2">
                <label for="unit" class="text-gray-800 text-md">Unit</label>
                <input type="text" name="unit" id="unit" value="{{ old('unit', $goal->unit) }}" class="border-2 border-gray-300 rounded-md p-2">
            </div>

            <div class="flex flex-col mt-2">
                <label for="deadline" class="text-gray-800 text-md">Deadline</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $goal->deadline) }}" class="border-2 border-gray-300 rounded-md p-2">
            </div>

            <div class="flex flex-col mt-2">
                <label for="notes" class="text-gray-800 text-md">Notes</label>
                <textarea name="notes" id="notes" class="border-2 border-gray-300 rounded-md p-2">{{ old('notes', $goal->notes) }}</textarea>
            </div>

            <div class="flex justify-center mt-4">
                <button type="submit" class="text-white bg-gray-700 hover:bg-blue-600 py-2 px-4 rounded-md">Update Goal</button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.layout')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-input label="Name" name="name" type="text" value="{{ auth()->user()->name }}" required />
                <x-input label="Email" name="email" type="email" value="{{ auth()->user()->email }}" required />
                <x-input label="Age" name="age" type="number" value="{{ auth()->user()->age }}" required min="1" />
                <x-input label="Gender" name="gender" type="text" value="{{ auth()->user()->gender }}" required />
                <x-input label="Height (cm)" name="height" type="number" value="{{ auth()->user()->height }}" required min="1" />
                <x-input label="Weight (kg)" name="weight" type="number" value="{{ auth()->user()->weight }}" required min="1" />
                <x-input label="Fitness Goal" name="fitness_goal" type="text" value="{{ auth()->user()->fitness_goal }}" required />
            </div>

            <div class="flex justify-center mt-6 space-x-4">
                <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition shadow-md">
                    Save Changes
                </button>
                <a href="{{ route('profile.show') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition shadow-md">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

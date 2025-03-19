@extends('layouts.layout')

@section('title', 'Profile')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200 p-8">
        <!-- Profile Header -->
        <div class="flex flex-col items-center">
            <div class="w-24 h-24 bg-blue-500 text-white rounded-full flex items-center justify-center text-4xl font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mt-4">{{ auth()->user()->name }}</h2>
            <p class="text-gray-600 text-lg">{{ auth()->user()->email }}</p>
        </div>

        <!-- User Stats -->
        <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-6 text-center">
            <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                <p class="text-xl font-semibold text-gray-900">{{ auth()->user()->age }}</p>
                <p class="text-gray-500">Age</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                <p class="text-xl font-semibold text-gray-900">{{ ucfirst(auth()->user()->gender) }}</p>
                <p class="text-gray-500">Gender</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                <p class="text-xl font-semibold text-gray-900">{{ auth()->user()->height }} cm</p>
                <p class="text-gray-500">Height</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                <p class="text-xl font-semibold text-gray-900">{{ auth()->user()->weight }} kg</p>
                <p class="text-gray-500">Weight</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                @php
                    $heightMeters = auth()->user()->height / 100;
                    $bmi = auth()->user()->weight / ($heightMeters * $heightMeters);
                @endphp
                <p class="text-xl font-semibold text-gray-900">{{ number_format($bmi, 1) }}</p>
                <p class="text-gray-500">BMI</p>
            </div>
        </div>

        <!-- Fitness Goal - Full Width -->
        <div class="mt-6 p-4 bg-gray-100 rounded-lg shadow-sm text-center">
            <p class="text-xl font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', auth()->user()->fitness_goal) }}</p>
            <p class="text-gray-500">Fitness Goal</p>
        </div>

        <!-- Edit Profile Button -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('profile.edit') }}" 
               class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-md">
                Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection

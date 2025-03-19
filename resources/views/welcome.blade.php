@extends('layouts.layout')

@section('title', 'Welcome to Fitness Tracker')

@section('content')
<div class="relative w-full h-screen flex items-center justify-center bg-gray-100">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?fitness,workout'); opacity: 0.3;"></div>

    <!-- Content -->
    <div class="relative text-center px-6">
        <h1 class="text-5xl font-extrabold text-blue-700 drop-shadow-lg">Achieve Your Fitness Goals</h1>
        <p class="mt-4 text-xl text-gray-800 font-medium">Track progress, set goals, and stay motivated!</p>

        <!-- Buttons -->
        <div class="mt-6 flex gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-blue-700 transition">
                Get Started
            </a>
            <a href="{{ route('login') }}" class="border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-blue-600 hover:text-white transition">
                Login
            </a>
        </div>
    </div>
</div>
@endsection

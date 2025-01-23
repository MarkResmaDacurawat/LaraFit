@extends('layouts.layout')

@section('title', 'Welcome to Fitness Tracker')

@section('content')
<div class="text-center py-10">
    <h1 class="text-4xl font-bold text-blue-600">Welcome to Fitness Tracker</h1>
    <p class="mt-4 text-lg text-gray-700">Track your fitness goals and progress effortlessly!</p>
    <a href="{{ route('auth.showRegister') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        Get Started
    </a>
</div>
@endsection

@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            Start Your Fitness Journey! 🏋️‍♂️
        </h1>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="mb-1">⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                <p>✅ {{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input label="Full Name" name="name" type="text" value="{{ old('name') }}" required />
                <x-input label="Email" name="email" type="email" value="{{ old('email') }}" required />
                <x-input label="Age" name="age" type="number" value="{{ old('age') }}" required />
                <x-select label="Gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </x-select>
                <x-input label="Height (cm)" name="height" type="number" value="{{ old('height') }}" step="0.1" required />
                <x-input label="Weight (kg)" name="weight" type="number" value="{{ old('weight') }}" step="0.1" required />
                <x-select label="Fitness Goal" name="fitness_goal">
                    <option value="lose_weight">Lose Weight</option>
                    <option value="gain_muscle">Gain Muscle</option>
                    <option value="maintain_weight">Maintain Weight</option>
                </x-select>
                <x-input label="Password" name="password" type="password" required />
                <x-input label="Confirm Password" name="password_confirmation" type="password" required />
            </div>

            <x-button text="REGISTER" class="mt-6" />
        </form>

        <p class="mt-4 text-center text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Log In</a>
        </p>
    </div>
</div>
@endsection

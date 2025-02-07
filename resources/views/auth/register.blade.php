@extends('layouts.layout')

@section('title', 'Register')
@section('content')
    <div class="pb-4">
        <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Start Your Fitness Journey!</h1>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="w-full h-full flex flex-col md:grid md:grid-cols-2 md:grid-row-5 gap-4">
                <div class="flex flex-col row-start-1 col-start-1 justify-end">
                    <label for="name" class="text-gray-800 text-md">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-2 col-start-1 justify-end">
                    <label for="email" class="text-gray-800 text-md">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-3 col-start-1 justify-end">
                    <label for="age" class="text-gray-800 text-md">Age</label>
                    <input type="number" name="age" id="age" value="{{ old('age') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-4 col-start-1 justify-end">
                    <label for="password" class="text-gray-800 text-md">Password</label>
                    <input type="password" name="password" id="password" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-5 col-start-1 justify-end">
                    <label for="password_confirmation" class="text-gray-800 text-md">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-1 col-start-2 justify-end">
                    <label for="gender" class="text-gray-800 text-md">Gender</label>
                    <select name="gender" id="gender" class="border-2 border-gray-300 rounded-md p-2" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="flex flex-col row-start-2 col-start-2 justify-end">
                    <label for="height" class="text-gray-800 text-md">Height (cm)</label>
                    <input type="number" name="height" id="height" value="{{ old('height') }}" step="0.1" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-3 col-start-2 justify-end">
                    <label for="weight" class="text-gray-800 text-md">Weight (kg)</label>
                    <input type="number" name="weight" id="weight" value="{{ old('weight') }}" step="0.1" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col row-start-4 col-start-2 justify-end">
                    <label for="fitness_goal" class="text-gray-800 text-md">Fitness Goal</label>
                    <select name="fitness_goal" id="fitness_goal" class="border-2 border-gray-300 rounded-md p-2">
                        <option value="lose_weight">Lose Weight</option>
                        <option value="gain_muscle">Gain Muscle</option>
                        <option value="maintain_weight">Maintain Weight</option>
                    </select>
                </div>
                <div class="flex flex-col row-start-5 col-start-2 items-center justify-end">
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">REGISTER</button>
                </div>
            </div>
        </form>
        @if($errors->any())
            <div class="mt-4 p-6 bg-red-400 rounded-sm">
                @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-white mb-2">{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif
        @if(session('success'))
            <div class="mt-4 p-6 bg-red-400 rounded-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>
@endsection
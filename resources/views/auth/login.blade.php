@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            Welcome Back! 👋
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

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4">
                <x-input label="Email" name="email" type="email" value="{{ old('email') }}" required />
                <x-input label="Password" name="password" type="password" required />
                <x-button text="LOGIN" class="mt-4" />
            </div>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Sign Up</a>
        </p>
    </div>
</div>
@endsection

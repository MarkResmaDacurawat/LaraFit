@extends('layouts.layout')

@section('title', 'Login')
@section('content')
    <div>
        <h1 class="text-[2rem] text-gray-700 mb-4 font-semibold">Login your account here!</h1>
        @if($errors->any())
            <div class="my-4 p-4 bg-red-300 rounded-sm">
                @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-red-600 mb-2">{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="w-full h-full flex flex-col gap-4">
                <div class="flex flex-col justify-end">
                    <label for="email" class="text-gray-800 text-md">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col justify-end">
                    <label for="password" class="text-gray-800 text-md">Password</label>
                    <input type="password" name="password" id="password" class="border-2 border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col items-center justify-end">
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-blue-600 py-2 rounded-md">LOGIN</button>
                </div>
            </div>
        </form>
    </div>
@endsection
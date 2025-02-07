<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\throwException;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        // Validate the request data
        $validatedData = $request->validated();
        
        $user = User::create($validatedData);

        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function login(LoginRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        
        throw ValidationException::withMessages([
            'credentials' => 'Invalid credentials'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

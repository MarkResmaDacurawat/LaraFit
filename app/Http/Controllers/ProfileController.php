<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('pages.profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('pages.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'age' => 'required|integer|min:10',
            'gender' => 'required|string',
            'height' => 'required|numeric|min:50',
            'weight' => 'required|numeric|min:20',
            'fitness_goal' => 'required|string',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'fitness_goal' => $request->fitness_goal,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}


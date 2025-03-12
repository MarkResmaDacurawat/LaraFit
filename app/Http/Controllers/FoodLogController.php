<?php

namespace App\Http\Controllers;

use App\Models\FoodLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodLogController extends Controller
{
    public function index()
    {
        $foodLogs = Auth::user()->foodLogs;
        return view('pages.food_logs.index', compact('foodLogs'));
    }

    public function create()
    {
        return view('pages.food_logs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'food_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'calories' => 'required|numeric|min:0',
            'carbs' => 'nullable|numeric|min:0',
            'protein' => 'nullable|numeric|min:0',
            'fats' => 'nullable|numeric|min:0',
        ]);

        $user = Auth::user();
        /** @var \App\Models\User $user */
        $user->foodLogs()->create($validatedData);

        return redirect()->route('food_logs.index')->with('success', 'Food log added successfully!');
    }

    public function edit($id)
    {
        $foodLog = FoodLog::findOrFail($id); 
        return view('pages.food_logs.edit', compact('foodLog'));
    }

    public function update(Request $request, $id)
    {
        $foodLog = FoodLog::findOrFail($id); 

        $validatedData = $request->validate([
            'date' => 'required|date',
            'food_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'calories' => 'required|numeric|min:0',
            'carbs' => 'nullable|numeric|min:0',
            'protein' => 'nullable|numeric|min:0',
            'fats' => 'nullable|numeric|min:0',
        ]);

        $foodLog->update($validatedData);

        return redirect()->route('food_logs.index')->with('success', 'Food log updated successfully!');
    }


    public function destroy(FoodLog $foodLog)
    {
        $foodLog->delete();
        return redirect()->route('food_logs.index')->with('success', 'Food log deleted successfully!');
    }
}

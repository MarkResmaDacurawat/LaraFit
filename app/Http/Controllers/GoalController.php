<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller {
    public function index() {
        $goals = Auth::user()->goals;
        return view('pages.goals.index', compact('goals'));
    }

    public function create() {
        return view('pages.goals.create');
    }

    public function edit(Goal $goal) {
        return view('pages.goals.edit', compact('goal'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'goal_type' => 'required|string|max:255',
            'target_value' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'deadline' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);
        $user = Auth::user();
        
         /** @var \App\Models\User $user */
         $user->goals()->create($validatedData);
        
        return redirect()->route('goals.index')->with('success', 'Goal added successfully!');
    }

    public function update(Request $request, Goal $goal) {
        $validatedData = $request->validate([
            'goal_type' => 'required|string|max:255',
            'target_value' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'deadline' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);
    
        $goal->update($validatedData);
    
        return redirect()->route('goals.index')->with('success', 'Goal updated successfully!');
    }    

    public function destroy($id) {
        $goal = Goal::findOrFail($id);
        $goal->delete();
        
        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully!');
    }
}

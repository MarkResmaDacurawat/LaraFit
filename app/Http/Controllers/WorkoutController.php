<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutRequest;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $workouts = $user->workouts;

        return view('pages.workouts.index', compact('workouts'));
    }

    public function create()
    {
        return view('pages.workouts.create');
    }

    public function store(StoreWorkoutRequest $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        $validatedData['user_id'] = $user->id;
        Workout::create($validatedData);

        return redirect()->route('workouts.index');
    }

    public function edit($id) {
        $workout = Workout::findOrFail($id);
        return view('pages.workouts.edit', compact('workout'));
    }
    
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'exercise_name' => 'required|string|max:255',
            'sets' => 'required|integer|min:1',
            'reps' => 'required|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
            'rest_period' => 'nullable|integer|min:0',
            'rpe' => 'nullable|integer|min:1|max:10',
        ]);
    
        $workout = Workout::findOrFail($id);
        $workout->update($validatedData);
    
        return redirect()->route('workouts.index')->with('success', 'Workout updated successfully!');
    }
    
    public function destroy($id){
        Workout::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('workouts.index');
    }
}

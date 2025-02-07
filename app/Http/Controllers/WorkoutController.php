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
    public function destroy($id){
        Workout::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('workouts.index');
    }
}

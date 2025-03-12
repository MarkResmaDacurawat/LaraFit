<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $activities = $user->activities;
        return view('pages.activities.index', compact('activities'));
    }
    public function create()
    {
        return view('pages.activities.create');
    }
    public function store(StoreActivityRequest $request){
        $validatedData = $request->validated();
        $user = Auth::user();

        /** 
         * @var \App\Models\User $user 
         * */
        $user->activities()->create($validatedData);
        return redirect()->route('activities.index');
    }

    public function edit($id) {
        $activity = Activity::findOrFail($id);
        return view('pages.activities.edit', compact('activity'));
    }
    
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'calories_burned' => 'nullable|integer|min:0',
            'distance' => 'nullable|numeric|min:0',
            'activity_type' => 'required|string|max:255',
        ]);
    
        $activity = Activity::findOrFail($id);
        $activity->update($validatedData);
    
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }
    
    public function destroy($id){
        Activity::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('activities.index');
    }
}

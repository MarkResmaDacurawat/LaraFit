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
        $validatedData['user_id'] = $user->id;
        $activities = Activity::create($validatedData);
        return redirect()->route('activities.index');
    }
    public function destroy($id){
        Activity::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('activities.index');
    }
}

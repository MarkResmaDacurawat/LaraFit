<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('pages.activities.index', compact('activities'));
    }
    public function create()
    {
        return view('pages.activities.create');
    }
}

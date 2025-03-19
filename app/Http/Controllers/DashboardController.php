<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\FoodLog;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Assuming authentication is set up

        // Fetching total workouts, food logs, and calories burned
        $totalWorkouts = Workout::where('user_id', $userId)->count();
        $totalCalories = Activity::where('user_id', $userId)->sum('calories_burned');
        $totalFoodLogs = FoodLog::where('user_id', $userId)->count();

        // Get activity data for Chart.js
        $activities = Activity::where('user_id', $userId)
            ->selectRaw('DATE(date) as date, SUM(calories_burned) as calories')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $dates = $activities->pluck('date');
        $calories = $activities->pluck('calories');

        // Get workout data for Chart.js
        $workouts = Workout::selectRaw('date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $workoutDates = $workouts->pluck('date')->toArray();
        $workoutCounts = $workouts->pluck('count')->toArray();

        $macros = FoodLog::selectRaw('SUM(carbs) as total_carbs, SUM(protein) as total_protein, SUM(fats) as total_fats')->first();


        return view('pages.dashboard', compact(
            'totalWorkouts', 'totalCalories', 'totalFoodLogs',
            'dates', 'calories', 'workoutDates', 'workoutCounts',
            'macros'
        ));
    }
}
?>
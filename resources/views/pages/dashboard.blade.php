@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Page Title -->
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total Workouts -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <i class="fas fa-dumbbell text-4xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Workouts</h2>
                <p class="text-3xl font-bold">{{ $totalWorkouts }}</p>
            </div>
        </div>

        <!-- Total Calories Burned -->
        <div class="bg-red-400 text-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <i class="fas fa-fire text-4xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Calories Burned</h2>
                <p class="text-3xl font-bold">{{ $totalCalories }} kcal</p>
            </div>
        </div>

        <!-- Total Food Logs -->
        <div class="bg-green-400 text-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <i class="fas fa-utensils text-4xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Food Logs</h2>
                <p class="text-3xl font-bold">{{ $totalFoodLogs }}</p>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Calories Burned Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Calories Burned Over Time</h2>
            <div class="h-[300px]">
                <canvas id="activityChart"></canvas>
            </div>
        </div>

        <!-- Workouts Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Workouts Over Time</h2>
            <div class="h-[300px]">
                <canvas id="workoutChart"></canvas>
            </div>
        </div>

        <!-- Macros Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Macros Chart</h2>
            <div class="h-[300px]">
                <canvas id="macroBreakdownChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Activity Chart
    var ctx1 = document.getElementById('activityChart').getContext('2d');
    var activityChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [{
                label: 'Calories Burned',
                data: @json($calories),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Workout Chart
    var ctx2 = document.getElementById('workoutChart').getContext('2d');
    var workoutCounts = @json($workoutCounts).map(Number); // Ensure values are numbers

    var workoutChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($workoutDates),
            datasets: [{
                label: 'Workouts',
                data: workoutCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: Math.max(...workoutCounts) + 2
                }
            }
        }
    });

    var ctx = document.getElementById('macroBreakdownChart').getContext('2d');
    var macroBreakdownChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Carbs', 'Protein', 'Fats'],
            datasets: [{
                data: [{{$macros->total_carbs}}, {{$macros->total_protein}}, {{$macros->total_fats}}],
                backgroundColor: ['#FFCE56', '#36A2EB', '#FF6384']
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

</script>
@endsection

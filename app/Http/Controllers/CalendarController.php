<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Meal;
use App\Models\Weight;


class CalendarController extends Controller
{
    private $meal;
    private $user;


    public function __construct(Meal $meal, User $user){
        $this->meal = $meal;
        $this->user = $user;
    }

    public function show()
    {
        $user = Auth::user();
        $user->load('meals');

        $currentDate = Carbon::now();
        $month = $currentDate->format('F');
        $year = $currentDate->format('Y'); 
        $day = $currentDate->day; 

        $weightChartData = $this->displayWeightChart();

        $latestMeal = Meal::latest()->first();
        // $meal = $this->meal->findOrFail($latestMeal->id);

        if ($latestMeal) {
            $meal = $this->meal->findOrFail($latestMeal->id);
        } else {
            $meal = null; 
        }
    

        if (!$user) { Log::error('Unable to find user'); }
        return view('weight_and_meals.weight_and_meals', compact('month', 'year', 'day', 'user','meal','weightChartData'));

    }

    public function displayWeightChart()
    {
        $userId = Auth::id();
        $goalWeight = User::find($userId)->goal_weight;
        $weights = Weight::selectRaw('MONTH(record_date) as month, AVG(current_weight) as avg_weight')
            ->where('user_id', $userId)
            ->groupBy('month')
            ->get();
        $chartData = [['MONTH', 'Average Weight', 'Goal Weight']];
        foreach ($weights as $weight) {
            $monthName = Carbon::createFromFormat('!m', $weight->month)->format('F');
            $chartData[] = [
                $monthName,
                $weight->avg_weight,
                $goalWeight
            ];
        }
        return $chartData;
    }

   
}
  
    
    






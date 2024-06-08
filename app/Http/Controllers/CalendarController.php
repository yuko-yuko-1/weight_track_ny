<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Meal;




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

        $latestMeal = Meal::latest()->first();
        // $meal = $this->meal->findOrFail($latestMeal->id);

        if ($latestMeal) {
            $meal = $this->meal->findOrFail($latestMeal->id);
        } else {
            $meal = null; 
        }
    

        if (!$user) { Log::error('Unable to find user'); }
        return view('weight_and_meals.weight_and_meals', compact('month', 'year', 'day', 'user','meal'));

    }

}
  
    
    






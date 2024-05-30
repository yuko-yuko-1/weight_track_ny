<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;



class CalendarController extends Controller
{
    public function show()
    {
        $currentDate = Carbon::now();
        $month = $currentDate->format('F');
        $year = $currentDate->format('Y'); 
        $day = $currentDate->day; 

        return view('weight-and-meals/weight-and-meals', compact('month', 'year', 'day'));

    }
}
  
    
    






<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChartController extends Controller
{
    public function LineChart()
    {
        // $labels = ['18','19','20','21'];
        // $data = [40,45,50,60];

        return view('weight_and_meals/weight_and_meals');
       
    }
}

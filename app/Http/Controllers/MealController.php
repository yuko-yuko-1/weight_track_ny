<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Meal;

class MealController extends Controller
{
    private $meal;

    public function __construct(Meal $meal){
        $this->meal = $meal;
    }

    // public function create(){
    //     $meal = $this->meal;
    //     return view('meal.today')->with('meal', $meal);
    // }

    public function store(Request $request){
        $request->validate([
            'image'=>'required|max:1048|mimes:jpeg,jpg,png,gif',
            'description' => 'required|max:1000'
        ]);


        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/images/meal'), $filename);

        $meal = new Meal();
       
        $this->meal->user_id = Auth::user()->id;
        $this->meal->record_date = now();
        $this->meal->image = $filename;
        $this->meal->description = $request->description;

        $this->meal->save();

        return redirect()->route('meal.today');
    }
}

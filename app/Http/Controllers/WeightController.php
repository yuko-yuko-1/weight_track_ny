<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Weight;

class WeightController extends Controller
{
    private $weight;

    public function __construct(Weight $weight){
        $this->weight = $weight;
    }
    // public function create(){
    //     $weight = $this->weight;

    //     return view('meal.today')->with('weight', $weight);
    // }

    public function store(Request $request){
        $request->validate([
            'record_date'=> 'required',
            'current_weight' => 'required'
        ]);

        $weight = new Weight();
        $this->weight->user_id = Auth::user()->id;
        $this->weight->record_date = $request->record_date;
        $this->weight->current_weight = $request->current_weight;

        $this->weight->save();

        return redirect()->route('meal.today');
    }
    
}


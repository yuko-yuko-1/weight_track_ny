<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Weight;
use Illuminate\Support\Facades\Auth;

class LogWeightHistoryController extends Controller
{
    private $user;
    private $weight;

    public function __construct(User $user, Weight $weight)
    {
        $this->user = $user;
        $this->weight = $weight;
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        // Retrieve all weight records for the user, ordered by date
        $weights = $this->weight->where('user_id', $user->id)
                                ->orderBy('record_date', 'desc')
                                ->get();

        // Get the latest weight entry if exists, else default to 0
        $latestWeight = $weights->first();
        $currentWeight = $latestWeight ? $latestWeight->current_weight : 0;

        return view('profile.logweight-history', [
            'user' => $user,
            'weights' => $weights,
            'current_weight' => $currentWeight,
        ]);
    }
    
     public function edit($id)
    {
        $weight = $this->weight->findOrFail($id);

        // Ensure the authenticated user is the owner of the weight record
        if (Auth::id() != $weight->user_id) {
            return redirect()->route('index');
        }

        return view('profile.logweight-history')
                    ->with('weight', $weight);
    }

public function update(Request $request, $id)
{
    $request->validate([
        'editWeight' => 'required|numeric',
    ]);

    $weight = $this->weight->findOrFail($id);

    $weight->current_weight = $request->editWeight;
    $weight->updated_at = now();
    $weight->save();

    return redirect()->back();
}


public function destroy($id)
    {
        $weight = $this->weight->findOrFail($id);

        $weight->delete();

       return redirect()->back();
}
}
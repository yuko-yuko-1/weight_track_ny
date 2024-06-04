<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LogWeightHistoryController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
      $this->user = $user;
    }

    public function show($id)
    {
    $user = $this->user->findOrFail($id);

    $primeWeight = $user->prime_weight;
    
    return view('profile.logweight-history', ['primeWeight' => $primeWeight, 'user' => $user]);
    }
}


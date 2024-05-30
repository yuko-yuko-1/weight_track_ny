<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Community;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function what_is_bmi()
    {
        return view('what-is-bmi');
    }

    public function weight_and_meals()
    {
        return view('weight_and_meals.weight_and_meals');
    }

    public function profile_main()
    {
        return view('profile.profile-main');
    }
    public function profile_edit()
    {
        return view('profile.profile-edit');
    }

    public function logweight_history()
    {
        return view('profile.logweight-history');
    }

    public function all_meal_posts()
    {
        return view('profile.all-meal-posts');
    }

    private $community;

    public function __construct(Community $community){
        $this->community = $community;
    }

    public function community()
    {
        $all_communities = $this->community->orderBy('id')->get();

        return view('community.community-top')->with('all_communities', $all_communities);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Community;
use App\Models\Post;

class HomeController extends Controller
{
    private $community;
    private $post;

    public function __construct(Community $community, Post $post){
        $this->community = $community;
        // $this->post = $post;
    }
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

    public function about_us()
    {
        return view('about_us');
    }

    public function faq()
    {
        return view('faq');
    }
    // public function weight_and_meals()
    // {
    //     return view('weight_and_meals.weight_and_meals');
    // }

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

    public function all_your_posts()
    {
        return view('profile.all-your-posts');
    }

    public function community()
    {
        $all_communities = $this->community->orderBy('id')->get();

        return view('community.community-top')->with('all_communities', $all_communities);
    }

    public function community_search(Request $request)
    {
        $search = $request->input('search');
        
        // 投稿のタイトルまたは内容に基づいて検索
        $posts = Post::where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->latest()
                    ->get();
    
        return view('community.search-results', compact('posts', 'search'));
    }

    public function community_post_search(Request $request, $id)
    {
        $community = $this->community->findOrFail($id);
        $search = $request->input('search');

        // 投稿のタイトルまたは内容に基づいて検索
        $posts = Post::where('community_id', $id)
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })
                    ->latest()
                    ->get();

        return view('community.search-results-posts', compact('posts', 'search', 'community'));
    }
    
}

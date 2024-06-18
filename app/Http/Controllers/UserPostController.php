<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Community;

class UserPostController extends Controller
{
    protected $user;
    protected $post;
    protected $community;

    public function __construct(User $user, Post $post, Community $community)
    {
        $this->user = $user;
        $this->post = $post;
        $this->community = $community;
    }

   public function show($id)
{
    $user = $this->user->findOrFail($id);

    if ($user->id != $id) {
        return redirect()->route('profile-main', ['id' => $user->id]);
    }

    $user_posts = $this->post->where('user_id', $user->id)->get();
    $communities = $this->community->all();

    return view('profile.all-your-posts', [
        'user' => $user,
        'user_posts' => $user_posts,
        'communities' => $communities
    ]);
}

}

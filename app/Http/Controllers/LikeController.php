<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    private $like;
    public function __construct(Like $like){
        $this->like = $like;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store($post_id)
    {
        $this->like->user_id = Auth::user()->id;
        $this->like->post_id = $post_id;
        $this->like->save();

        return redirect()->back();

    }

    public function show(Like $like)
    {
        //
    }

    public function edit(Like $like)
    {
        //
    }

    public function update(Request $request, Like $like)
    {
        //
    }

    public function destroy($post_id)
    {
        $this->like->where('user_id',Auth::user()->id)->where('post_id',$post_id)->delete();

        return redirect()->back();

    }
}

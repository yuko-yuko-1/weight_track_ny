<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request,$id)
    {
        //
        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $id;
        $this->comment->comment_content = $request->comment_content;
        $this->comment->save();

        return redirect()->back();


    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy($id)
    {
        //
        $this->comment->destroy($id);

        return redirect()->back();
    }

}

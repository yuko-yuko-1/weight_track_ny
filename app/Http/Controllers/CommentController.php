<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class CommentController extends Controller
{
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request,$postId)
    {

        $request->validate([
            'add-comment' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $postId;
        $comment->comment_content = $request->input('add-comment');
        $comment->save();

        return redirect()->route('post.show', $postId);

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

    public function update(Request $request, $comment_id)
    {

            $request->validate([
                'comment_content' => 'required|string|max:255',
            ]);

            //find the record to update
            $comment = Comment::findOrFail($comment_id);

            //update the column data
            $comment->comment_content = $request->input('comment_content');
            $comment->save();

            return redirect()->route('post.show', $comment->post_id);
        }



    public function destroy($comment_id)
    {

        $comment = Comment::findOrFail($comment_id);
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('post.show', $post_id);

    }

}

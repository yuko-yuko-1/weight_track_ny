<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Community;
use App\Models\Comment;
use App\Models\Like;
// use App\Models\User;

class PostController extends Controller
{
    private $post;
    private $community;

    public function __construct(Post $post, Community $community){
        $this->post = $post;
        $this->community = $community;

    }

    public function community_all_posts($id)
    {
        $community = $this->community->findOrFail($id);
        $all_posts = Post::where('community_id', $community->id)->latest()->get();
        // $all_users = $this->user->all();

        return view('community.community-all-posts')->with('community', $community)
                                                    ->with('all_posts', $all_posts);
                                                    // ->with('all_users', $all_users);
    }
    
    // public function create(){
    //     $all_communities = $this->community->all();

    //     return view('community.community-top')
    //     ->with('all_communities', $all_communities);
    // }

    public function store(Request $request, $id){

        $community = $this->community->findOrFail($id);
        \Log::info('ID: ' . $id);
        \Log::info('Request: ' . json_encode($request->all()));

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'image' => 'required|max:1048|mimes:jpeg,jpg,png,gif'
        ]);

        // \Log::info('Request: ' . json_encode($request->all()));
        $this->post->user_id = Auth::user()->id;
        $this->post->community_id = $community->id;
        $this->post->image = 'data:image/'.$request->image->extension().
                            ';base64,'.base64_encode(file_get_contents($request->image));
        $this->post->title = $request->title;
        $this->post->content = $request->content;
        $this->post->save();

        return redirect()->back();
    }

    public function show($id){
        // ↓元々のコード
        $post = $this->post->findOrFail($id);

        return view('community.post.contents.show-post')->with('post', $post);

        // $post = Post::with(['comments.user'])->findOrFail($id);
        // return view('community.post.contents.show-post')->with('post', $post);
    }

    // public function edit($id){
    //     $post_a = $this->post->findOrFail($id);
    //     $all_communities = $this->community->all();

    //     return view('posts.contents.modals.edit')->with('post', $post_a)
    //                                 ->with('all_communities', $all_communities)
    //                                 ->with('selected_community', $post_a->community_id);
    // }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'image' => 'max:1048|mimes:jpeg,jpg,png,gif'
        ]);

        //find the record to update
        $post = $this->post->findOrFail($id);

        //update the column data
        $post ->title = $request->title;
        $post ->content = $request->content;

        // if ($request->hasFile('image')) { 
            
        //     Log::info('Request data: ', $request->all());
        //     $imagePath = $request->file('image'); 
        //     Log::info('Imaged stored in:  ', ['path' => $imagePath]);
        //     $imageName = time() . '_' . $imagePath->getClientOriginalName(); 
        //     $imagePath->move(public_path('/images/post'), $imageName);
            
        //     // 古いpost画像のパスを取得
        //     $oldImagePath = $post->image;

        //     // 新しいpost画像のパスを保存
        //     $post->image = $imageName;

        //     // 古いpost画像を削除する
        //     if ($oldImagePath) {
        //         $oldImageFullPath = public_path('/images/post/') . $oldImagePath;
        //         if (file_exists($oldImageFullPath)) {
        //             unlink($oldImageFullPath);
        //         }
        //     }
        // }

        if($request->image){  //if the form has an image submitted
            $post->image = 'data:image/'.$request->image->extension().
                            ';base64,'.base64_encode(file_get_contents($request->image));
        }

        $post ->save();

        return redirect()->route('post.show', $id);
    }

    public function destroy($id){
       // $this->post->destroy($id);
        $post = $this->post->findOrFail($id);
        $community_id = $post->community_id;
        $post->forceDelete(); //-- forces a permanent delete

        return redirect()->route('community_all_posts', ['id' => $community_id]);
    }

    // Comment and Likes


    public function Comment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'comment_content' => $request->comment_content

        ]);

        return view('community.post.contents.show-post')->with('comment', $comment);
    }

    public function likePost($postId)
    {
        $like = Like::where('post_id', $postId)->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $postId,
                'user_id' => auth()->id()
            ]);
        }

}

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;

class CommunitiesController extends Controller
{
    private $community;

    public function __construct(Community $community)
    {
        $this->community = $community;
    }

    public function index()
    {
        $all_communities = $this->community->orderBy('updated_at', 'desc')->paginate(10);
        // paginateでページ割り付けできる！

        return view('admin.communities.index')
                ->with('all_communities', $all_communities);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:50|unique:communities,name',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
        ]); 
        $file = $request->file('image');
        $this->community->name  = ucwords(strtolower($request->name));
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/images/community'), $filename);
        // $this->community->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        // $this->community->save();

        // Save the filename to the database
        $this->community->image = $filename;
        $this->community->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:50|unique:communities,name,' . $id,
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
        ]);

        $community = $this->community->findOrFail($id);
        $community->name  = ucwords(strtolower($request->name));
        // 画像は更新しない可能性もあるので、ifに入れる。
        if ($request->image) {
            // $user->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images/community'), $filename);
            $community->image = $filename;
        }
        $community->save();

        return redirect()->back();
    }

    public function destroy($id)
    {     
        $this->community->destroy($id);

        return redirect()->back();
        
    }
}

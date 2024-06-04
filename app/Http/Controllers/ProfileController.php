<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
      $this->user = $user;
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('profile.profile-main')->with('user',$user);
    }

    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('profile.profile-edit')
                ->with('user', $user);
    }

public function update(Request $request)
{
    // ユーザーを取得
    $user = $this->user->findOrFail(Auth::user()->id);

    // 古いパスワードが正しいかどうかを確認
    if (!Hash::check($request->input('password'), $user->password)) {
        Log::error('The old password is incorrect');
        return redirect()->back()->withErrors(['password' => 'The old password is incorrect.']);
    }
    

    // 新しいパスワードが入力されている場合、確認用のパスワードと一致するかを確認
    if ($request->filled('new_password') && $request->input('new_password') !== $request->input('confirm_password')) {
        Log::error('New password and confirm password must match');
        return redirect()->back()->withErrors(['confirm_password' => 'New password and confirm password must match.']);
    }
        

    // バリデーションルールを定義
    $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
        'height' => 'nullable|numeric',
        'goal_weight' => 'nullable|numeric',
        'goal_date' => 'nullable|date',
        'purpose' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    // パスワードが入力されている場合には、バリデーションルールを追加する
    if (!empty($request->input('new_password'))) {
        $rules['new_password'] = 'nullable|string|min:8';
        $rules['confirm_password'] = 'same:new_password';
    }

    $request->validate($rules);

    // パスワードの更新
    if (!empty($request->input('new_password'))) {
        $user->password = bcrypt($request->input('new_password'));
    }

    // その他のユーザー情報の更新
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->height = $request->height;
    $user->goal_weight = $request->goal_weight;
    $user->goal_date = $request->goal_date;
    $user->purpose = $request->purpose;

    // アバターの更新
    if ($request->hasFile('avatar')) { 
    // 新しい写真をアップロードする
    $file = $request->file('avatar'); 
    $filename = time() . '_' . $file->getClientOriginalName(); 
    $file->move(public_path('/images/Profile'), $filename);
    
    // 古い写真のパスを取得
    $oldAvatarPath = $user->avatar;

    // 新しい写真のパスを保存
    $user->avatar = $filename;

    // 古い写真を削除する
    if ($oldAvatarPath) {
        $oldAvatarFullPath = public_path('/images/Profile/') . $oldAvatarPath;
        if (file_exists($oldAvatarFullPath)) {
            unlink($oldAvatarFullPath);
        }
    }
}
    $user->save();

    return redirect()->route('profile-main', Auth::user()->id);
}

  public function destroy($id)
{
    try {
        // ログインユーザーのIDを取得
        $loggedInUserId = Auth::user()->id;

        // 削除対象のユーザーがログインユーザー自身であることを確認
        if ($id == $loggedInUserId) {
            // ユーザーを削除
            $user = $this->user->findOrFail($id);
            $user->delete();
            return redirect()->route('index');
        } else {
            // ログインユーザー以外のユーザーは削除できない旨を通知
            return redirect()->back()->withErrors(['error' => 'You are not authorized to delete this user.']);
        }
    } catch (\Exception $e) {
        // 削除に失敗した場合のエラーログとリダイレクト
        Log::error('Failed to delete user: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Failed to delete user.']);
    }
}


}


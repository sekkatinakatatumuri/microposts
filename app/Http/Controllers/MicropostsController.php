<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{   
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        } else {
            return view('welcome');
        }
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);

        // マイクロポストを作成
        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        // トップページにリダイレクト
        return redirect('/');
    }
    
    public function destroy($id)
    {
        // マイクロポストを取得
        $micropost = \App\Micropost::find($id);

        // Authのidと投稿者idが一致する場合削除
        if (\Auth::user()->id === $micropost->user_id) {
            $micropost->delete();
        }

        // リダイレクト
        return redirect()->back();
    }
}

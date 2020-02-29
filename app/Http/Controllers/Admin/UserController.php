<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //userデータ登録内容の変更
use Illuminate\Support\Facades\Hash; //パスワードの変更
use App\User;//論理削除

class UserController extends Controller
{
    //userデータの取得
    public function index() {
        return view('user.index', ['user' => Auth::user() ]);
    }
    //userデータの編集
    public function edit() {
        return view('user.edit', ['user' => Auth::user() ]);
    }
    //userデータの保存
    public function update(Request $request) {
        
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('user/index');
    }
    
    // パスワードの保存
    //passwordの編集
    public function password_edit() {
        return view('user.password_edit', ['user' => Auth::user() ]);
    }
    public function password_update(Request $request) {
        
        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
    }
    //論理削除
    public function softdelete()
    {
        User::find(Auth::id())->delete();
        return redirect('news/index');
    }

    
}

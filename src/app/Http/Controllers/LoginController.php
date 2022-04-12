<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admins')->attempt($credentials)) { // ログイン試行
            return redirect()->intended('admin/dashboard'); // ダッシュボードへ
        }
        return back()->withErrors([
            'auth' => ['認証に失敗しました']
        ]);
    }
}

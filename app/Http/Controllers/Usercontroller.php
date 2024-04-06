<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Usercontroller extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:20',
            'email' => 'required|email',
            'password' => 'required|min:8|max:50|confirmed',
            'nickname' => 'required|min:1|max:8'
        ], [
            'name.required' => '실명을 입력해주세요.',
            'name.min' => '실명은 최소 2글자 이상이어야 합니다.',
            'name.max' => '실명은 최대 20글자 이하입니다.',
            'email.required' => '이메일을 입력해주세요.',
            'email.email' => '올바른 이메일 형식을 입력해주세요.',
            'password.required' => '비밀번호를 입력해주세요.',
            'password.min' => '비밀번호는 최소 8자 이상이어야 합니다.',
            'password.max' => '비밀번호는 최대 50자 이하입니다.',
            'password.confirmed' => '확인 비밀번호가 일치하지 않습니다.',
            'nickname.required' => '닉네임을 입력해주세요.',
            'nickname.min' => '닉네임은 최소 1글자 이상이어야 합니다.',
            'nickname.max' => '닉네임은 최대 8글자 이하입니다.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'nickname' => $request->nickname,
                'token' => Str::random(16)
            ]);
            return redirect('/auth/login');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['name' => '사용자 정보를 다시 확인해주세요.'])->withInput();
        }
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::guard('user')->attempt($credentials)) {
            // 로그인 성공 시, 사용자를 'index'로 리디렉션하고 성공 메시지 추가
            return redirect('/')->with('success', '로그인에 성공하였습니다.');
        }

        return back()->withErrors([
            'invalid' => '유효한 계정이 아닙니다.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', '로그아웃 되었습니다.');
    }
}

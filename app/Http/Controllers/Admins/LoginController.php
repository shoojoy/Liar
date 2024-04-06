<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function main(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // 인증 성공: 관리자 대시보드로 리다이렉트
            return redirect('admin/');
        }

        // 인증 실패: 에러 메시지와 함께 이전 페이지로 리다이렉션
        return back()->withErrors(['invalid' => '유효한 계정이 아닙니다.']);
    }
}

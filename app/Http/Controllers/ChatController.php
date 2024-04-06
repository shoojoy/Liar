<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessageSent; // 오타 수정: ChatMassageSent -> ChatMessageSent

class ChatController extends Controller
{
    /**
     * 메시지를 보내고 이벤트를 발생시키는 함수
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        // 요청 데이터 유효성 검사
        $validated = $request->validate([
            'message' => 'required|string|max:255', // 메시지는 필수이고 문자열, 최대 255자
        ]);

        // 유효성 검사를 통과한 메시지 내용
        $message = $validated['message'];

        // 이벤트 발생
        event(new ChatMessageSent($message));

        // 메시지 전송 성공 응답 반환
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully.'
        ]);
    }
}

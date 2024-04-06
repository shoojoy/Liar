<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateRoomController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:16',
        ], [
            'name.required' => '방제를 입력해주세요.',
            'name.max' => '방제는 최대 16글자입니다.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages())->withInput();
        }

        $room = null; // 변수를 블록 외부로 이동

        DB::transaction(function () use ($request, &$room) { // 변수를 참조로 전달
            $user = Auth::guard('user')->user(); // 현재 인증된 사용자 가져오기
            $room = Room::create([
                'name' => $request->name,
                'max_users' => 8
            ]);

            RoomUser::create([
                'room_id' => $room->id,
                'user_id' => $user->id,
                'is_master' => 'Y',
            ]);
        });

        // 변수의 값이 설정되어 있는지 확인 후 리다이렉트
        if ($room) {
            return redirect()->route('game.room', ['roomId' => $room->id]); // 수정된 리다이렉트 방식
        } else {
            // 방 생성에 실패한 경우의 처리
            return back()->withInput()->withErrors('방 생성에 실패하였습니다.');
        }
    }
}

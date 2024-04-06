<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Redirect;

class GameRoomController extends Controller
{
    public function create()
    {
        // 방 생성 폼을 보여주는 뷰 반환
        return view('game-rooms.create');
    }
    public function store(Request $request)
    {
        // 유효성 검사
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // 방 이름 필드
            'max_users' => 'required|integer|min:8', // 최대 사용자 수 필드
        ]);

        // 방 생성
        $room = new Room();
        $room->name = $validatedData['name'];
        $room->max_users = $validatedData['max_users'];
        $room->save(); // 방을 데이터베이스에 저장

        // 생성된 방의 상세 페이지로 리디렉션
        return redirect()->to('/game/room/' . $room->id);
    }

    public function lobby()
    {
        $rooms = Room::all(); // 데이터베이스에서 모든 방 정보를 조회
        return view('game.lobby', compact('rooms')); // 조회한 정보를 뷰로 전달
    }
    public function index()
    {
        $rooms = Room::all(); // 모든 방 가져오기
        return response()->json($rooms); // 방 목록을 JSON으로 반환
    }
    //     public function show($room)
    //     {
    //         $room = Room::findOrFail($room); // 방 ID로 방 정보 조회
    //         return view('rooms.show', compact('room')); // 조회한 방 정보를 뷰로 전달
    //     }
}

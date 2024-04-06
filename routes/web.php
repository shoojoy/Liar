<?php

use App\Http\Controllers\Admins\LoginController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CreateRoomController;
use App\Http\Controllers\GameRoomController;

Route::get('/', function () {
    return view('index');
});
Route::prefix('auth')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    });
    Route::get('register', function () {
        return view('auth.register');
    });
    Route::get('adminpage', function () {
        return view('auth.adminpage');
    });
    Route::post('register', [Usercontroller::class, "register"]);
    Route::post('login', [Usercontroller::class, "login"]);
});
Route::middleware('user')->group(function () {
    Route::prefix('game')->group(function () {
        Route::get('lobby', function () {
            return view('game.lobby');
        });
        Route::get('room/{roomId}', function () {
            return view('game.room');
        })->name('game.room');
        Route::get('createroom', function () {
            return view('game.createroom');
        });
        Route::get('/', function () {
            return view('game.createroom');
        })->name('game.createroom');
        Route::post('create-room', [CreateRoomController::class, 'store']);
    });
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// 관리자 패널
Route::prefix('admin')->group(function () {
    // 로그인해야만 접속 가능한 그룹
    Route::middleware('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        });
    });
    // 로그인 관련
    Route::prefix('auth')->group(function () {
        Route::get('login', function () {
            return view('admin.login');
        });
        Route::post('login', [LoginController::class, 'main']);
    });
});
// 방 생성 폼 페이지
Route::get('/game-rooms/create', [GameRoomController::class, 'create'])->name('gamerooms.create');

// 방 생성 처리
Route::post('/game-rooms', [GameRoomController::class, 'store'])->name('gamerooms.store');



Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');
// Route::post('/send-message', 'ChatController@send'); // 이 줄은 제거하거나 주석 처리



Route::post('/createroom', [CreateRoomController::class, 'store'])->name('createroom.store');

Route::get('/lobby', [GameRoomController::class, 'lobby'])->name('lobby');

Route::get('/rooms', [GameRoomController::class, 'index']);
Route::post('/rooms', [GameRoomController::class, 'store']);
// 게임 방 상세 페이지
Route::get('/game/room/{room}', 'App\Http\Controllers\GameRoomController@show')->name('game.room.show');

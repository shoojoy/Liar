<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    protected $fillable = ['room_id', 'user_id', 'is_master'];

    // 방과 사용자 모델과의 관계를 정의할 수 있습니다.
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 방과 사용자 간의 관계를 정의하는 'room_users' 테이블을 생성합니다.
     */
    public function up(): void
    {
        Schema::create('room_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('is_master', ['Y', 'N'])->default('N');
            $table->timestamps();
        });
    }

    /**
     * 'room_users' 테이블을 롤백합니다.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_users');
    }
};

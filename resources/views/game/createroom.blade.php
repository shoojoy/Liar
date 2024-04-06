{{-- 사용자 정의 레이아웃 확장 --}}
@extends('users.layouts.main')

{{-- 메인 콘텐츠 섹션 --}}
@section('content')
    <div class="container">
        <h1>방 생성</h1>
        <form action="/game/create-room" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">방 이름:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">생성</button>
        </form>
    </div>
@endsection

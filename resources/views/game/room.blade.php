{{-- 사용자 정의 레이아웃 확장 --}}
@extends('users.layouts.main')

{{-- 메인 콘텐츠 섹션 --}}
@section('content')
    <h1>Pusher 테스트</h1>
    <p>채널 <code>LiarGameChat</code>에 이벤트 <code>ChatMessageSent</code>를 발행해 보세요.</p>
    <div id="messages"></div> {{-- 메시지를 동적으로 표시할 div --}}
    <form id="message-form">
        <input type="text" id="message-input" placeholder="메시지를 입력하세요" required>
        <button type="submit">보내기</button>
    </form>
@endsection

{{-- 페이지 별 추가 스크립트 섹션 --}}
@section('script')
    @parent
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script src="{{ asset('assets/js/room.js') }}"></script>
@endsection

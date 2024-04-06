@extends('users.layouts.main')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2>게임방 대기 로비</h2>
            <a href="{{ route('game.createroom') }}" class="btn btn-primary">방 생성하기</a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>방 목록</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="roomList">
                            <!-- JS를 통해 방 목록 동적으로 채울 예정 -->
                            <div class="text-center">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                로딩 중...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>참여자 목록</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="participantList">
                            <!-- JS를 통해 참여자 목록 동적으로 채울 예정 -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/gameLobby.js') }}"></script>
@endsection

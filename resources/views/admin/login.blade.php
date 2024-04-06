@extends('users.layouts.main')
@section('content')
    <div class="container custom-loginmargin">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">관리자 페이지 접속</div>
                    <div class="card-body">
                        <!-- 로그인 실패 메시지 -->
                        @if ($errors->has('invalid'))
                            <div class="alert alert-danger">
                                {{ $errors->first('invalid') }}
                            </div>
                        @endif


                        <form method="POST" action="/admin/auth/login">
                            @csrf

                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label">아이디</label>
                                <input type="text" class="form-control" id="email" name="username" required
                                    autofocus>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">비밀번호</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">로그인</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

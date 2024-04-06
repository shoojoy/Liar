@extends('users.layouts.main')
@section('content')
    <div class="container custom-margin">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">회원가입</div>
                    <div class="card-body">
                        <form method="POST" action="/auth/register">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">이름</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">이메일</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">비밀번호</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">비밀번호 확인</label>
                                <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" required>
                            </div>

                            <!-- Nickname -->
                            <div class="mb-3">
                                <label for="nickname" class="form-label">닉네임</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" required>
                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">가입하기</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

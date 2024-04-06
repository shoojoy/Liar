<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Liar Game</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/#home">게임시작 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#rule">게임규칙</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#">고객센터</a>
            </li>
            @if (Auth::guard('user')->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        프로필 {{-- 로그인 상태일 때 표시할 텍스트 --}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">프로필 보기</a>
                        <!-- 로그아웃 form으로 변경 -->
                        <form action="/logout" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="/logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            로그아웃
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        마이페이지
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/auth/login">로그인</a>
                        <a class="dropdown-item" href="/auth/register">회원가입</a>
                        <a class="dropdown-item" href="/auth/adminpage">관리자</a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>

{{-- </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    마이페이지
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/auth/login">로그인</a>
                    <a class="dropdown-item" href="/auth/register">회원가입</a>
                    <a class="dropdown-item" href="/auth/adminpage">관리자</a>
                </div>
            </li>
        </ul>
    </div>
</nav> --}}

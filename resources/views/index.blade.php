@extends('users.layouts.main')
@section('content')
    <section id="home">
        <a class="btn btn-info start-btn-position" style="background-color: transparent; border: none;" href="/game/lobby">
            <h1>입장</h1>
        </a>
    </section>
    <section id="rule">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-8">
                    <h5>
                        게임 설명<br>
                        게임시작 후 이용자들은 주어진 주제를 받습니다.<br>
                        라이어는 주어진 주제를 받지 못한 상태로 시작합니다.<br>
                        배신자는 라이어가 승리할 수 있게 서포트 합니다.<br>
                        시작후 순차적으로 제시받은 단어를 설명합니다.<br>
                        너무 자세하게 설명하면 라이어가 단어를 유추하기 쉬워집니다.<br>
                        그렇다고 너무 애매하게 말하면 투표를 많이 받습니다.<br>
                        마지막 순번의 설명이 끝나면 토론시간이 주어집니다.<br>
                        토론시간은 2분 입니다.<br>
                        토론시간 종료시 투표시간이 시작됩니다.<br>
                        투표시간에서 라이어는 제시어를 입력합니다.<br>
                        라이어가 정답을 맞출 시 게임은 라이어가 승리합니다.<br>
                        투표시간은 30초 입니다.<br>
                        투표에서 라이어가 걸릴 시 이용자는 승리합니다.<br>
                        투표에서 라이어외의 이용자가 죽을 시<br>
                        게임은 계속 진행됩니다.<br>
                        배신자는 라이어가 승리할 시 승리합니다.<br>
                        배신자와 라이어는 서로 누군지 확인할 수 없습니다.<br>
                        배신자는 제시어를 입력할 수 없습니다<br>
                        제시어를 입력할 시 배신자는 그 즉시 탈락됩니다.<br>
                    </h5>
                </div>
            </div>
        </div>
    </section>
@endsection

$(document).ready(function () {
    const roomList = $('#roomList');
    const createRoomButton = $('#createroomLink'); // ID가 아닌, 다른 선택자를 사용했는지 확인하세요

    // 서버로부터 방 목록을 가져오는 함수
    function loadRooms() {
        $.ajax({
            url: '/api/rooms', // 서버의 방 목록 API 엔드포인트
            type: 'GET',
            dataType: 'json', // 명시적으로 데이터 타입을 JSON으로 지정
            success: function (data) {
                // 성공 시, 방 목록을 DOM에 추가
                updateRoomList(data);
            },
            error: function () {
                // 에러 발생 시, 에러 메시지를 표시
                showError();
            }
        });
    }

    // 방 목록을 업데이트하는 함수
    function updateRoomList(rooms) {
        roomList.empty(); // 기존 목록을 비움
        rooms.forEach(function (room) {
            const roomItem = $('<li>', {
                'class': 'list-group-item',
                'text': room.name,
                'click': function () { // 각 방 항목 클릭 이벤트
                    window.location.href = `/game/room/${room.id}`; // 해당 방의 상세 페이지로 리다이렉션
                }
            });
            roomList.append(roomItem);
        });
    }

    // 에러 메시지를 표시하는 함수
    function showError() {
        roomList.empty(); // 기존 목록을 비움
        roomList.append($('<li>', {
            'class': 'list-group-item list-group-item-danger',
            'text': '방 목록을 불러오는 데 실패했습니다.'
        }));
    }

    // 이벤트 리스너를 설정하는 함수
    function setupEventListeners() {
        createRoomButton.on('click', function () {
            // 'data-url' 속성을 사용하여 리다이렉션
            window.location.href = $(this).data('url');
        });
    }

    // 초기화 함수
    function init() {
        loadRooms(); // 방 목록 로드
        setupEventListeners(); // 이벤트 리스너 설정
        setInterval(loadRooms, 5000); // 5초마다 방 목록을 업데이트
    }

    init(); // 초기화 함수 호출
});

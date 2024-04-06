$(function () {
    // Pusher 설정
    const pusher = new Pusher('63e197692f7fd35f0f92', {
        cluster: 'ap3',
        encrypted: true,
        forceTLS: true
    });

    // Pusher 채널 구독
    const channel = pusher.subscribe('LiarGameChat');
    channel.bind('ChatMessageSent', function (data) {
        // 수신된 메시지를 페이지에 추가
        $('#messages').append($('<p>').text(data.message)); // 올바른 선택자는 #messages 입니다.
    });

    // 메시지 폼 제출 이벤트 처리
    $('#message-form').submit(function (e) {
        e.preventDefault(); // 기본 제출 동작 방지

        const message = $('#message-input').val().trim(); // 입력 필드에서 메시지 텍스트를 가져옴
        if (message) { // 메시지가 비어있지 않은 경우에만 처리
            sendMessage(message); // 메시지 전송 함수 호출
            $('#message-input').val(''); // 입력 필드 초기화
        }
    });
});

// 메시지 전송 함수
function sendMessage(message) {
    $.ajax({
        url: '/send-message',
        type: 'POST',
        data: { message: message }, // JSON.stringify를 제거하고, 객체로 직접 전송
        contentType: 'application/json', // 서버가 JSON을 기대하는 경우 유지
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (response) {
            console.log('Message sent successfully:', response);
            // 여기서 response를 사용하여 성공 메시지를 페이지에 추가할 수도 있습니다.
            $('#message').append($('<p>').text(message)); // 메시지를 바로 추가
        },
        error: function (error) {
            console.error('Error sending message:', error);
            alert('메시지 전송에 실패했습니다.');
        }
    });
}

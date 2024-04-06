import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// 환경 변수를 더 명확하게 처리하기 위한 설정 객체
const pusherConfig = {
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY, // 환경 변수에서 Pusher 앱 키 가져오기
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER, // 환경 변수에서 Pusher 클러스터 가져오기
    wsHost: import.meta.env.VITE_PUSHER_HOST, // 환경 변수에서 WebSocket 호스트 가져오기
    wsPort: parseInt(import.meta.env.VITE_PUSHER_PORT, 10) || 80, // 환경 변수에서 WebSocket 포트 가져오기, 기본값 80
    wssPort: parseInt(import.meta.env.VITE_PUSHER_PORT, 10) || 443, // 환경 변수에서 Secure WebSocket 포트 가져오기, 기본값 443
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https', // TLS 강제 사용 여부 결정
    enabledTransports: ['ws', 'wss'] // 사용할 전송 방식 지정
};

// Pusher를 글로벌 객체로 설정
window.Pusher = Pusher;

// Laravel Echo 인스턴스 생성 및 설정
window.Echo = new Echo(pusherConfig);

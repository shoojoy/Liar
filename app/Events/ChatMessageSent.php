<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * 채팅 메시지가 전송되었을 때 브로드캐스팅되는 이벤트
 */
class ChatMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * 전송된 메시지
     *
     * @var string
     */
    public $message;

    /**
     * 새 인스턴스 생성
     *
     * @param string $message 메시지 내용
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * 이벤트가 브로드캐스팅될 채널
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('LiarGameChat');
    }

    /**
     * 브로드캐스트할 데이터
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return ['message' => $this->message];
    }
}

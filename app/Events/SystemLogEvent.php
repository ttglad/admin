<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SystemLogEvent
{
    use InteractsWithSockets, SerializesModels;

    public $type = '';
    public $content = '';

    /**
     * Create a new event instance.
     *
     * @param int $type
     * @param string $content
     *
     */
    public function __construct($type, $content)
    {
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

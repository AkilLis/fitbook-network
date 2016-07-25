<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Chat extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $messageText;
    public $username;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username = 'nameless user', $messageText = 'empty')
    {
        //
        $this->username = $username;
        $this->messageText = $messageText;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['flexgym'];
    }
}

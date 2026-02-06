<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class DemoEvent implements ShouldBroadcastNow
{
    use SerializesModels;

    public string $message;
    public string $role;

    public function __construct(string $message, string $role)
    {
        $this->message = $message;
        $this->role = $role;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('role.' . $this->role);
    }

    public function broadcastAs()
    {
        return 'role.message';
    }
}

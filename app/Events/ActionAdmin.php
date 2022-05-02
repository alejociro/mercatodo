<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActionAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public string $action;

    public function __construct(User $user, string $action)
    {
        $this->user = $user;
        $this->action = $action;
    }

}

<?php

namespace App\Listeners;

use App\Events\ActionAdmin;
use App\Models\Action;

class RegisterAction
{
    public function handle(ActionAdmin $event)
    {
        Action::create([
            'user_id' => $event->user->getRouteKey(),
            'name' => $event->action,
        ]);
    }
}

<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Carbon;

class ChangeUserStatusAction
{
    public function execute(User $user): void
    {
        if ($user->disabled_at == null) {
            $user->disabled_at = Carbon::now();
        } else {
            $user->disabled_at = null;
        }
        $user->save();
    }
}

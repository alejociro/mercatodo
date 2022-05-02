<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\ExportProductReady;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected User $user;
    protected string $filePath;
    protected Notification $notification;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($user, $filePath)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    public function handle(): void
    {
        $userNotify = $this->user;
        $userNotify->notify(new ExportProductReady($this->filePath));
    }
}

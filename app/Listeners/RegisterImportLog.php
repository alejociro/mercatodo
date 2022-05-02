<?php

namespace App\Listeners;

use App\Events\UploadFileImportProducts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class RegisterImportLog
{
    public function handle(UploadFileImportProducts $event)
    {
        Log::info('Import' . $event->message, [
            'user' => $event->user->email,
            'date' => Carbon::now(),
        ]);
    }
}

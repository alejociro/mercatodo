<?php

namespace App\Providers;

use App\Events\ActionAdmin;
use App\Events\UploadFileImportProducts;
use App\Events\ProductSoldEvent;
use App\Listeners\AddProductSold;
use App\Listeners\RegisterAction;
use App\Listeners\RegisterImportLog;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Observers\ModelObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ProductSoldEvent::class => [
            AddProductSold::class,
        ],

        UploadFileImportProducts::class => [
            RegisterImportLog::class,
        ],

        ActionAdmin::class => [
           RegisterAction::class,
        ],
    ];

    public function boot(): void
    {
        User::observe(ModelObserver::class);
        Product::observe(ModelObserver::class);
        Category::observe(ModelObserver::class);
        Payment::observe(ModelObserver::class);
    }
}

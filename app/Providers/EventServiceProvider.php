<?php

namespace App\Providers;

use App\Jobs\ProductCreatedJob;
use App\Jobs\ProductDeletedJob;
use App\Jobs\ProductUpdatedJob;
use App\Jobs\TestJob;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    /*protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];*/

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // created product
        \App::bindMethod(ProductCreatedJob::class . '@handle', function ($job) {
            return $job->handle();
        });

        // updated product
        \App::bindMethod(ProductUpdatedJob::class . '@handle', function ($job) {
            return $job->handle();
        });

        // deleted product
        \App::bindMethod(ProductDeletedJob::class . '@handle', function ($job) {
            return $job->handle();
        });
    }
}

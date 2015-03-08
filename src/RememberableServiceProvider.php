<?php
namespace Watson\Rememberable;

use Illuminate\Support\ServiceProvider;

class RememberableServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Illuminate\Database\Connection', 'Watson\Rememberable\Connection')
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('client.home.home', function ($view) {
            $notificationpanels=DB::table('notification_panels')->value('status');
            $view->with('notificationpanels', $notificationpanels);
            if ($notificationpanels==1) {
                View::composer('client.messages.notification', function ($view) {
                    $notifications = DB::table('notifications')->where('notification_status', 1)->get();
                    $view->with('notifications', $notifications);
                });
            }
        });
    }
}

<?php

namespace App\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class HandleExceptions extends \Illuminate\Foundation\Bootstrap\HandleExceptions
{
    /**
     * Bootstrap the exception handling for the application.
     *
     * This app runs on Laravel 8 with PHP 8.1, where some vendor packages emit
     * deprecation notices that should not fail the whole bootstrap process.
     */
    public function bootstrap(Application $app)
    {
        self::$reservedMemory = str_repeat('x', 10240);

        $this->app = $app;

        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleShutdown']);

        if (! $app->environment('testing')) {
            ini_set('display_errors', 'Off');
        }
    }
}

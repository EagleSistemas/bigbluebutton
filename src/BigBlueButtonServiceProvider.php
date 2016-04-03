<?php namespace EagleSistemas\BigBlueButton;

use Illuminate\Support\ServiceProvider;

class BigBlueButtonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bigbluebutton.php' => config_path('bigbluebutton.php')
        ]);
    }
    public function register()
    {
        $this->app->singleton('bigbluebuttonapi', function () {
            if(empty($_SERVER['BBB_SECURITY_SALT'])) {
                $_SERVER['BBB_SECURITY_SALT'] = \Config::get('bigbluebutton.bbb_security_salt');
            }
            if(empty($_SERVER['BBB_SERVER_BASE_URL'])) {
                $_SERVER['BBB_SERVER_BASE_URL'] = \Config::get('bigbluebutton.bbb_server_url');
            }
            return new BigBlueButton();
        });

        $this->app->bind('EagleSystem\BBB\BigBlueButtonApi', 'bigbluebuttonapi');
    }

    public function provides()
    {
        return [
            'bigbluebuttonapi'
        ];
    }
}
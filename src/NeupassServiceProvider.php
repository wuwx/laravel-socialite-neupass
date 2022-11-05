<?php
namespace Wuwx\LaravelSocialiteNeupass;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class NeupassServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Socialite::extend('neupass', function() {
            return new NeupassProvider();
        });
    }

    public function register()
    {
        //
    }
}

<?php
namespace Wuwx\LaravelSocialiteNeupass;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use phpCAS;

class NeupassServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Socialite::extend('neupass', function() {
            return new class {
                public function __construct()
                {
                    phpCAS::client(CAS_VERSION_2_0, "pass.neu.edu.cn", 443, "tpass");
                    phpCAS::setNoCasServerValidation();
                }
                public function redirect()
                {
                    phpCAS::setFixedServiceURL(phpCAS::getServiceURL() . "/callback");
                    return redirect(phpCAS::getServerLoginURL());
                }
                public function user()
                {
                    phpCAS::forceAuthentication();
                    return (new User)->map([
                        'id' => phpCAS::getUser(),
                        'name' => phpCAS::getAttribute('USER_NAME'),
                    ]);
                }
            };
        });
    }

    public function register()
    {
        //
    }
}

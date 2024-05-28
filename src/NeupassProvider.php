<?php

namespace Wuwx\LaravelSocialiteNeupass;

use Laravel\Socialite\Contracts\Provider as ProviderContract;
use phpCAS;

class NeupassProvider implements ProviderContract
{
    public function __construct()
    {
        phpCAS::client(CAS_VERSION_2_0, "pass.neu.edu.cn", 443, "tpass", url('/'));
        phpCAS::setNoCasServerValidation();
    }

    public function redirectUrl($url)
    {
        phpCAS::setFixedServiceURL($url);
        return $this;
    }

    public function redirect()
    {
        return redirect(phpCAS::getServerLoginURL());
    }

    public function user()
    {
        phpCAS::forceAuthentication();
        return (new User)->map([
            'id' => phpCAS::getUser(),
            'name' => phpCAS::getAttribute('USER_NAME'),
            'email' => phpCAS::getAttribute('EMAIL'),
        ]);
    }
}

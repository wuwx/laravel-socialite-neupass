<?php

namespace Wuwx\LaravelSocialiteNeupass\Test;

use Laravel\Socialite\Facades\Socialite;

class NeupassProviderTest extends TestCase
{
    protected function defineRoutes($router)
    {
        $router->get('/login/neupass', function () {
            return Socialite::driver('neupass')->redirectUrl("http://localhost/login/neupass/callback")->redirect();
        });
    }

    public function testRedirect()
    {
        $this->get('/login/neupass')->assertRedirectContains('https://pass.neu.edu.cn/tpass/login');
    }
}

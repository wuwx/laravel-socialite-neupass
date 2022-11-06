<?php

namespace Wuwx\LaravelSocialiteNeupass\Test;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class NeupassProviderTest extends TestCase
{
    public function testRedirect()
    {
        $provider = Socialite::driver('neupass');
        $provider->redirectUrl('http://localhost');
        $this->assertInstanceOf(RedirectResponse::class, $provider->redirect());
    }
}

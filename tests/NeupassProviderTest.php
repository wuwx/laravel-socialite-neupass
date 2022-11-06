<?php

namespace Wuwx\LaravelSocialiteNeupass\Test;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class NeupassProviderTest extends TestCase
{
    public function testRedirect()
    {
        $this->assertInstanceOf(RedirectResponse::class, Socialite::driver('neupass')->redirectUrl('http://localhost')->redirect());
    }
}

<?php

namespace Wuwx\LaravelSocialiteNeupass\Test;

use Laravel\Socialite\SocialiteServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Wuwx\LaravelSocialiteNeupass\NeupassServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            NeupassServiceProvider::class,
            SocialiteServiceProvider::class,
        ];
    }
}
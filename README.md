# laravel-socialite-neupass

```composer require wuwx/laravel-socialite-neupass```

```php
<?php
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('neupass')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('neupass')->user();
    }
}
```

```php
Route::get('login/neupass', 'Auth\LoginController@redirectToProvider');
Route::get('login/neupass/callback', 'Auth\LoginController@handleProviderCallback');
```

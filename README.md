# laravel-socialite-neupass

```composer require wuwx/laravel-socialite-neupass```

```php
<?php
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return redirect()->route("login.neupass");
    }
    public function redirectToProvider()
    {
        return Socialite::driver('neupass')
                        ->redirectUrl(request()->getUri() . "/callback")
                        ->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('neupass')->user();
    }
}
```

```php
Route::get('login/neupass', 'Auth\LoginController@redirectToProvider')->name("login.neupass");
Route::get('login/neupass/callback', 'Auth\LoginController@handleProviderCallback')->name("login.neupass.callback");
```

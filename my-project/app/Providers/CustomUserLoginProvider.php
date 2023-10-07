<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider;

class CustomUserLoginProvider extends UserProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    public function validateCredentials(UserContract $user, array $credentials)
{
    $plain = $credentials['uuid']; 

    return $this->hasher->check($plain, $user->getAuthPassword());
}
}

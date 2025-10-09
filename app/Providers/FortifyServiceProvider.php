<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use App\Http\Responses\RegisterViewResponse as AppRegisterViewResponse;
use App\Http\Responses\LoginViewResponse as AppLoginViewResponse;
use App\Http\Responses\TwoFactorChallengeViewResponse as AppTwoFactorChallengeViewResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ensure the RedirectsIfTwoFactorAuthenticatable contract is bound
        // with an explicit guard resolution to avoid null guard injection.
        $this->app->singleton(\Laravel\Fortify\Contracts\RedirectsIfTwoFactorAuthenticatable::class, function ($app) {
            return new RedirectIfTwoFactorAuthenticatable(
                $app['auth']->guard(config('fortify.guard')),
                $app->make(\Laravel\Fortify\LoginRateLimiter::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    // Fix: Bind RegisterViewResponse contract to default implementation
    $this->app->singleton(RegisterViewResponse::class, AppRegisterViewResponse::class);
    $this->app->singleton(\Laravel\Fortify\Contracts\LoginViewResponse::class, AppLoginViewResponse::class);
    $this->app->singleton(\Laravel\Fortify\Contracts\TwoFactorChallengeViewResponse::class, AppTwoFactorChallengeViewResponse::class);
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}

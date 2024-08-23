<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
 	if($this->app->environment('production')) {
    		//parent::boot();
    		// Add following lines to force laravel to use APP_URL as root url for the app.
    		$strBaseURL = $this->app['url'];
    		$strBaseURL->forceRootUrl(config('app.url'));
	}
	if($this->app->environment('production')) {
		\URL::forceScheme('https');
	}
        Gate::define('admin', function (User $user) {
            return Auth::user()->tipe_user == 'ADMIN';
        });
        Gate::define('inspeksi', function (User $user) {
            return Auth::user()->tipe_user == 'INSPEK';
        });
        Gate::define('pemohon', function (User $user) {
            return Auth::user()->tipe_user == 'USER';
        });
    }
}

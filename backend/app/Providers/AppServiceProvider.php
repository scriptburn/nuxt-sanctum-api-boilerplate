<?php

namespace App\Providers;

use App\Services\ScalesrepApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->isLocal())
		{
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
			$this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
		}

		$this->app->singleton(ScalesrepApiService::class, function ($app)
		{
			return new ScalesrepApiService(env('SCALSREP_API_KEY'));
		});
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}

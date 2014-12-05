<?php namespace FluxBB\Docs\Providers;

use FluxBB\Docs\Documentation;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a great spot to register your various container
		// bindings with the application. As you can see, we are registering our
		// "Registrar" implementation here. You can add your own bindings too!

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'FluxBB\Docs\Services\Registrar'
		);

		$this->app->bind('FluxBB\Docs\Documentation', function () {
			$filesystem = new Filesystem(new Local($this->app['config']['docs.path']));
			return new Documentation($filesystem);
		});
	}

}

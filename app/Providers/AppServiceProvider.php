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
		$this->app->bind('FluxBB\Docs\Documentation', function () {
			$filesystem = new Filesystem(new Local($this->app['config']['docs.path']));
			return new Documentation($filesystem);
		});

		$this->app->bind(
			'FluxBB\Docs\Markdown\ParserInterface',
			'FluxBB\Docs\Markdown\CiconiaParser'
		);
	}

}

<?php namespace Bszalai\Settings;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SettingsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Run when request generated
	 * 
	 * @return void
	 */
	public function boot()
	{
		// by default Laravel doesn't find the config file, need to use this form
		$this->package('bszalai/settings', null, __DIR__.'/../../..');

		// register the autoload
		AliasLoader::getInstance()->alias('S', 'Bszalai\Settings\Settings');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['settings'] = $this->app->share(function($app)
		{
			return new Settings;
		});
	}	

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('settings');
	}

}

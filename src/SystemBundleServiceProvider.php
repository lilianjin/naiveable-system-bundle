<?php

namespace Naiveable\SystemBundle;

use Naiveable\Foundation\Http\Domain;
use Naiveable\Routing\Facades\Route;
use Naiveable\Support\Contracts\RouteableProviderInterface;
use Naiveable\Support\ServiceProvider;

/**
 * class SystemBundleServiceProvider
 *
 * PHP business application development core system
 *
 * This content is released under the Business System Toll License (MST)
 *
 * @link     https://ofcold.com
 * @link     https://naiveable.com
 *
 * @author   Bill Li (bill.li@ofcold.com) [Owner]
 *
 * @license https://licenses.naiveable.com/mst  MST License
 *
 * @copyright  Copyright (c) 2017-2019 Bill Li, Ofcold Institute of Technology. All rights reserved.
 */
class SystemBundleServiceProvider extends ServiceProvider implements RouteableProviderInterface
{
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Naiveable\SystemBundle\Http\Controllers';

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register(): void
	{
		$this->registerBundle('naiveable.bundle.system', __DIR__);

		// Register configuration namespace any bundle services.
		$this->addNamespaceForConfig($this->bundle->getNamespace(), $this->bundle->getPath('resources/config'));

		// Register view namespace any bundle services.
		$this->addNamespaceForView($this->bundle->getNamespace(), $this->bundle->getPath('resources/views'));

		// Register a database migrate files of the service provider.
		$this->loadMigrationsFrom($this->bundle->getPath('database/migrations'));
	}

	/**
	 * Bootstrap any package services.
	 *
	 * @return void
	 */
	public function boot(): void
	{
		$this->translatorLoader();
	}

	/**
	 * Register the Ofcold regions routes.
	 *
	 * @return $this
	 */
	public function map()
	{
		Route::namespace($this->getNamespaceForApp('Admin'))
			->domain(Domain::route('admin.api'))
			->middleware('auth:api')
			->as('naiveable.bundle.system::api.')
			->prefix('admin')
			->group(function () {
				Route::get('/system/routes', 'RoutesController@preview');
			});
	}

	/**
	 * Register translation namespace any bundle services.
	 *
	 * @return void
	 */
	public function translatorLoader(): void
	{
		$path = $this->bundle->getPath('resources/lang');

		// Load package translator.
		$this->loadTranslationsFrom($path, $this->bundle->getNamespace());
		$this->loadJsonTranslationsFrom($path);
	}
}

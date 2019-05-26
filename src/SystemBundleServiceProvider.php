<?php

namespace Naiveable\SystemBundle;

use Illuminate\Support\Facades\Route;
use Naiveable\Foundation\Http\Domain;
use Naiveable\Support\Contracts\BundleableProviderInterface;
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
class SystemBundleServiceProvider extends ServiceProvider implements RouteableProviderInterface,
	BundleableProviderInterface
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
	}

	/**
	 * Bootstrap any package services.
	 *
	 * @return void
	 */
	public function boot(): void
	{
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

}

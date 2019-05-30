<?php

namespace Naiveable\SystemBundle\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use Naiveable\Foundation\Http\Controllers\AdminController;
use Naiveable\Stringy\Str;

/**
 * class RoutesController
 *
 * PHP business application development core system
 *
 * This content is released under the Business System Toll License (MST)
 *
 * @link	 https://ofcold.com
 * @link	 https://naiveable.com
 *
 * @author   Bill Li (bill.li@ofcold.com) [Owner]
 *
 * @license https://licenses.naiveable.com/mst  MST License
 *
 * @copyright  Copyright (c) 2017-2019 Bill Li, Ofcold Institute of Technology. All rights reserved.
 */
class RoutesController extends AdminController
{
	/**
	 * Return all the registered routes.
	 *
	 * @return \Naiveable\Http\JsonResponse
	 */
	public function preview()
	{
		$routes = collect(Route::getRoutes())->map(function ($route, $index) {

			$routeName = $route->action['as'] ?? '';

			if (Str::endsWith($routeName, '.')) {
				$routeName = '';
			}

			$routeMiddleware = $route->action['middleware'] ?? [];

			if (! is_array($routeMiddleware)) {
				$routeMiddleware = [$routeMiddleware];
			}

			return [
				'host' => $route->domain(),
				'uri' => $route->uri,
				'as' => $routeName,
				'methods' => $route->methods,
				'action' => $route->action['uses'] ?? '',
				'middleware' => $routeMiddleware,
			];
		});

		return response()->json($routes);
	}
}

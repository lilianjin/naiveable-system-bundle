<?php

namespace Naiveable\SystemBundle\Routing;

use Naiveable\Foundation\Bundle\Navigatorable;

/**
 * class RouteNavigatorAble
 *
 * PHP business application development core system
 *
 * This content is released under the Toocold Technology Lab License. (TTL)
 *
 * @link     https://ofcold.com
 * @link     https://naiveable.com
 *
 * @author   Bill Li (bill.li@ofcold.com) [Owner]
 *
 * @license https://licenses.naiveable.com/mst  TTL License
 *
 * @copyright  Copyright (c) 2017-2019 Bill Li, Toocold Institute of Technology. All rights reserved.
 */
class RouteNavigatorAble extends Navigatorable
{
	/**
	 * Get the URI key for the resource.
	 *
	 * @return string
	 */
	public static function uriKey(): string
	{
		return 'system-routes';
	}

	/**
	 * Get the component name for the view.
	 *
	 * @return string
	 */
	public static function getComponent(): string
	{
		return 'ofcold.bundle.system::routes';
	}

	/**
	 * Get the displayable label of the resource.
	 *
	 * @return string
	 */
	public static function label(): string
	{
		return 'routes';
	}

	/**
	 * Get the displayable singular label of the resource.
	 *
	 * @return string
	 */
	public static function singularLabel(): string
	{
		return 'Routes';
	}
}

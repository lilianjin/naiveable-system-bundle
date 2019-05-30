<?php

namespace Naiveable\SystemBundle;

use Naiveable\Foundation\Bundle\Bundle;

/**
 * class SystemBundle
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
class SystemBundle extends Bundle
{
	/**
	 * The addon icon.
	 *
	 * @var  string
	 */
	protected $icon = 'puzzle-piece';

	/**
	 * The bundle type.
	 *
	 * @var string
	 */
	protected $type = 'bundle';

	/**
	 * The bundle slug.
	 *
	 * @var string
	 */
	protected $slug = 'system';

	/**
	 * The bundle vendor.
	 *
	 * @var string
	 */
	protected $vendor = 'naiveable';

	/**
	 * The namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'naiveable.bundle.system';

	/**
	 * Register the given resources.
	 *
	 * @return static
	 */
	public static function resources()
	{
		return [
			// \Naiveable\Actions\ActionResource::class
		];
	}

	/**
	 * Get the navigations.
	 *
	 * @return array
	 */
	public static function navigations()
	{
		return [
			Routing\RouteNavigatorAble::class,
		];
	}

	/**
	 * Get the bundle path.
	 *
	 * @return string|null
	 */
	public function getPath(?string $path = null)
	{
		if (! $this->path) {
			$this->path = realpath(__DIR__ . '/../');
		}

		return parent::getPath($path);
	}

}

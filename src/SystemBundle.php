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
	 * The navigation display flag.
	 *
	 * @var  bool
	 */
	protected $navigation = true;

	/**
	 * The addon icon.
	 *
	 * @var  string
	 */
	protected $icon = 'puzzle-piece';

	/**
	 * The view's component.
	 *
	 * @var string
	 */
	public $component = 'settings';

	/**
	 * The bundle's sections.
	 *
	 * @var string|array
	 */
	protected $sections = [
		[
			'slug'			=> 'routes',
			'uriKey'		=> 'routes',
			'component'		=> 'ofcold.bundle.system::routes',
			'singularLabel'	=> 'Routes'
		],
	];

}

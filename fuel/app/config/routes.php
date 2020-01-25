<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	'_root_' => 'welcome/index',
	'_404_' => 'welcome/404',

    // 正規表現によるルーティング
    'bbs/(:any)'       => 'routingtest/entry/$1',   // (1)
    '(:segment)/about'  => 'routingtest/about/$1',  // (2)
    '([0-9]{3})/detail' => 'routingtest/id/$1',     // (3)

    // 名前付きパラメータによるルーティング
    'cal/:year/:month/:day/:any' => 'welcome/404',      // (4)
    'cal/:year/:month/:day'      => 'routingtest/cal',  // (5)
    'cal/:year/:month'           => 'routingtest/cal',  // (6)
    'cal/:year'                  => 'routingtest/cal',  // (7)

    // HTTPメソッドによるルーティング
    'api/(:any)' => array(
        array('GET',  new Route('routingtest/get/$1')),
        array('POST', new Route('routingtest/post/$1'))
    ),  // (8)

    // 名前付きルート
    'admin/dashboard' => array('admin/index', 'name' => 'admin'),  // (9)
);

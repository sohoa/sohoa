<?php

use Sohoa\Framework\Framework;

$router = \Sohoa\Framework\Framework::services('router');

$router->get('/', array('as' => 'root',
                        'to' => 'Main#index'));

// The following code allows to route uri like
// http://domain.com/customController/customAction/
// http://domain.com/customController/customAction/myParam
$router->any('(?<controller>.[^/]+)/(?<action>.[^/]+)/(?<param>.+)?');

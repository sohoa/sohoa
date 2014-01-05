<?php

use Sohoa\Framework\Framework;

$router = \Sohoa\Framework\Framework::services('router');

$router->get('/', array('as' => 'root',
                        'to' => 'Main#index'));

// The following code allows to route uri like
// http://domain.com/customController/customAction/
// http://domain.com/customController/customAction/myParam
$router->any('(?<controller>.[^/]+)/(?<action>.[^/]+)/(?<param>.+)?');

// The following line will route all exceptions to the method Application\Error\DefaultAction()
$router->addErrorRoute(Sohoa\Framework\Router::ROUTE_ERROR, 'Error#Default');

// For unknown routes, the following line gives a specific error controller
$router->addErrorRoute(Sohoa\Framework\Router::ROUTE_ERROR_404, 'Error#Err404');
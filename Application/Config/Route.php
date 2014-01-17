<?php

/* @var $framework \Sohoa\Framework\Framework */

// Defines the defaults route
$this->get('/', array('as' => 'root',
                        'to' => 'Main#index'));

// The following code allows to route uri like
// http://domain.com/customController/customAction/
// http://domain.com/customController/customAction/myParam

$this->any('/(?<controller>[a-zA-Z_]\w*)/(?<action>[a-zA-Z_]\w*)/(?<value>.+)?');

$err = $this->getFramework()->getErrorHandler();

// The following line allow to transform every php errors as an exception \ErrorException
$err->handleErrorsAsException();

// The following line will route all exceptions to the method Application\Error\DefaultAction()
$err->routeError(\Sohoa\Framework\ErrorHandler::ROUTE_ALL_ERROR, 'Error#Default');

$err->routeError(\Sohoa\Framework\ErrorHandler::ROUTE_ERROR_404, 'Error#Err404');

// The following line is an example for routing specific Exception type
$err->routeError('\ErrorException', 'Error#PHP');

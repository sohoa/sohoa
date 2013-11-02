<?php

use Sohoa\Framework\Framework;

$router = \Sohoa\Framework\Framework::services('router');

$router->get('/', array('as' => 'root',
                        'to' => 'Main#index'));

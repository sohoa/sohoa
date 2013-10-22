<?php

namespace {


    use Hoa\Router\Http;
    use Sohoa\Framework\Framework;

    require_once __DIR__ . '/../vendor/autoload.php';

    $framework         = new Framework();
    $framework->router = new Http();
    $framework->router->get('h', '/', 'Main', 'Index');
    $framework->run();


}
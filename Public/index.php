<?php

    include '../../vendor/autoload.php';

    from('Sohoa')
        ->import('Framework.Boostrap');

    $application = new \Sohoa\Framework\Bootstrap(); // The application is started !

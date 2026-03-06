<?php

    require_once __DIR__ . '/../vendor/autoload.php';


    use Slim\Factory\AppFactory;

    $app = AppFactory::create();

    require __DIR__ . '/../App/routes.php';

    $app->run();
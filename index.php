<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new \Slim\Slim();

$app->add(new \CorsSlim\CorsSlim());

require_once __DIR__.'/app/routes.php';

$app->run();
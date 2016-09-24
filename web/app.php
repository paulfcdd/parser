<?php
ini_set('display_errors', 1);
include_once __DIR__ . "/../vendor/autoload.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function () use($app) {
    return $app['twig']->render('index.twig', array(
        
    ));
});

$app->get('/hello/{name}', function($name) use($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $app->escape($name),
    ));
});

$app->run();
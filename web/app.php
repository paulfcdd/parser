<?php
ini_set('display_errors', 1);
include_once __DIR__ . "/../vendor/autoload.php";
use Symfony\Component\HttpFoundation\Request;
use simple_html_dom as SHD;

$app = new Silex\Application();

$app
    ->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ . '/../views',
    ));

$app
    ->get('/', function () use ($app) {
        return $app['twig']->render('index.twig', array());
    })
    ->bind('homepage');


$app
    ->post('/get_link', function(Request $request) use($app){
        return $request->request->get('url');
    })
    ->bind('ajax_req');


//$app->get('/test', function() use($app) {
//    return $app['twig']->render('test.twig', array(
//        'test'=>'Test message',));
//    })
//    ->bind('test');
//
//$app->get('/hello/{name}', function ($name) use ($app) {
//    return $app['twig']->render('hello.twig', array(
//        'name' => $app->escape($name),
//    ));
//});

$app->run();
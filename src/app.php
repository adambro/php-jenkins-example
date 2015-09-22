<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../db/worldcup.db',
    ),
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__ . '/View'
    )
));

$app->get('/', function () use ($app) {
    $eventDao = new \Mila\DAO\eventDAO($app['db']);

    return $app['twig']->render('index.twig', array(
        'events' => $eventDao->fetchAll()
    ));
});

$app->get('/event/{id}', function ($id) use ($app) {
    $eventDao = new \Mila\DAO\eventDAO($app['db']);

    return $app['twig']->render('event.twig', array(
        'event' => $eventDao->fetchById($id)
    ));
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $name
    ));
});

$app->get('/teams', function () use ($app) {

    $dao = new \Mila\DAO\teamDAO($app['db']);
    
    return $app['twig']->render('teams.twig', array(
        'teams' => $dao->fetchAll()
    ));
});


return $app;

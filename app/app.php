<?php

require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$cache = new \StashPHP\Setup();

$app->get('/', function() {
    return new Response('Welcome to my new Silex app');
});

$app->get('/cache/clear', function() use ($cache) {
    $cache->getPool()->getItem('model/test')->clear();

    return new Response("cleared");
});

$app->get('/cache/{set}', function($set) use ($cache) {
    $test123 = $cache->getPool()->getItem('model/test/1234/info');

    $data = $test123->get();

    if ($test123->isMiss()) {
        $test123->lock();
        $test123->set($set);

        return new Response("setted!");
    }

    return new Response($data);
});

return $app;
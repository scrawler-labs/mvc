<?php

//For error during boot
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//Load env files
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../',);
$dotenv->load();

$app = new \Scrawler\App();

// Register Woops to handle exceptions
$app->registerHandler('exception', function($e){
    $whoops = new \Whoops\Run;
    $whoops->allowQuit(false);
    $whoops->writeToOutput(false);
    if(\Scrawler\App::engine()->config()->has('api') && \Scrawler\App::engine()->config()->get('api')){
        $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);
    }else{
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    }
    return $whoops->handleException($e);
});

// Load Configurations
$app->config()->load(__DIR__ . '/../config');

if($app->config()->get('general.env') == 'dev'){
    $app->config()->set('debug', true);
}

// Register Directories
$app->registerAutoRoute(__DIR__ . '/controllers', 'App\Controllers');

$app->template()->registerDir(__DIR__ . '/views',__DIR__ . '/../storage/framework/cache',__DIR__ . '/../assets');

$app->storage()->setAdapter(new \Scrawler\Adapters\Storage\LocalAdapter(__DIR__ . '/../storage/app'));

$app->db()->connect($app->config()->get('database'));

// Run the app

$app->run();
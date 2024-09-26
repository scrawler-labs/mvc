<?php


$app = new \Scrawler\App();

$app->config()->load(__DIR__ . '/config/app.php');

if($app->config()->get('general.env') == 'dev'){
    $app->config()->set('debug', true);
}

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

// Register Directories
$app->registerAutoRoute(__DIR__ . '/controllers', 'App\Controllers');

$app->template()->registerDir(__DIR__ . '/views',__DIR__ . '../storage/cache',__DIR__ . '/../assets');

$app->storage()->setAdapter(new \Scrawler\Adapters\Storage\LocalAdapter(__DIR__ . '/../storage/app'));

$app->db()->connect($app->config()->get('database'));

// Run the app

$app->run();
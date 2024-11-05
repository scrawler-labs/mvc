<?php
/*
 * This file is part of the Scrawler package.
 *
 * (c) Pranjal Pandey <its.pranjalpandey@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Do not modify this file , use app.php to register your services
 */

//Load env files
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../',);
$dotenv->load();


// Load Configurations
app()->config()->load(__DIR__ . '/../config');

include __DIR__ . '/routes.php';

if(app()->config()->get('general.env') == 'dev'){
    app()->config()->set('debug', true);
}else{
    app()->config()->set('debug', false);
}

// Register Directories
app()->registerAutoRoute(__DIR__ . '/Controllers', 'App\Controllers');

app()->middleware(app()->config()->get('middlewares'));

app()->template()->registerDir(__DIR__ . '/views',__DIR__ . '/../storage/framework/cache',__DIR__ . '/../public/assets');

app()->storage()->setAdapter(new \Scrawler\Adapters\Storage\LocalAdapter(__DIR__ . '/../storage/app'));

app()->handler('404', function(){
    return app()->template()->render('errors.404');
});

app()->handler('405', function(){
    return app()->template()->render('errors.405');
});

app()->handler('505', function(){
    return app()->template()->render('errors.505');
});

try{
    app()->db()->connect(app()->config()->get('database'));
}catch(Doctrine\DBAL\Exception\ConnectionException){
    // Let it run peacefully unless database is used
}

include __DIR__ . '/app.php';

// Run the application
app()->run();
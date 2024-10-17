<?php


//Load env files
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../',);
$dotenv->load();


// Load Configurations
app()->config()->load(__DIR__ . '/../config');

if(app()->config()->get('general.env') == 'dev'){
    app()->config()->set('debug', true);
}else{
    app()->config()->set('debug', false);
}



// Register Directories
app()->registerAutoRoute(__DIR__ . '/Controllers', 'App\Controllers');

app()->template()->registerDir(__DIR__ . '/views',__DIR__ . '/../storage/framework/cache',__DIR__ . '/../assets');

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
// Run the app

app()->run();
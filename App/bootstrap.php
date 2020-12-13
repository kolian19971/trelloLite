<?php

use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

/*
 * Environment variable
 */
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/env.php'))
    include_once $_SERVER['DOCUMENT_ROOT'].'/env.php';

if(!function_exists('env')) {
    function env($key, $default = null){
        $value = getenv($key);

        if ($value === false)
            return $default;

        return $value;
    }
}

/*
 * New PDO connection
 */
$dsn =  env('DB_CONNECTION').':host='.env('DB_HOST').';dbname='.env('DB_DATABASE').';port='.env('DB_PORT');
$pdo = new PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));

// Build Connection object with PdoBridge ad Adapter
$conn = new Connection(new PdoBridge($pdo));

// Pass this connection to Factory
$qbf = new QueryBuilderFactory($conn);

/**
 * Loading base classes and models
 */
spl_autoload_register(function ($class_name) {
    @include_once $_SERVER['DOCUMENT_ROOT'].'/App/base/'.$class_name . '.php';
    @include_once $_SERVER['DOCUMENT_ROOT'].'/App/Models/'.$class_name . '.php';
});

/**
 * Initialize routing
 */
Route::init();

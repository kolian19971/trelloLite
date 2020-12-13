<?php

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

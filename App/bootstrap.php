<?php
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

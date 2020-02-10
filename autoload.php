<?php

error_reporting(E_ERROR | E_PARSE);

spl_autoload_register(function($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $class_name = str_replace('App', 'src', $class_name);

    include_once $class_name.'.php';
});

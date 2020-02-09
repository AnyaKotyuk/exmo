<?php

function __autoload($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $class_name = str_replace('App', 'src', $class_name);

    include_once $class_name.'.php';
}
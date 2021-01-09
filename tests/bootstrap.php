<?php

function class_auto_loader($className)
{
    $parts = explode('\\', $className);
    $dir = dirname(dirname(__FILE__)) . '/src/';
    $path = $dir . implode('/', $parts) . '.php';
    require_once $path;
}

spl_autoload_register('class_auto_loader');

$test = new \Traefik\Config();

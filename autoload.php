<?php

spl_autoload_register(function($class){
    $cl   = str_replace(array('\\', '/', 'corehat\\'), array(DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, ""), $class);
    $file = dirname(__FILE__).DIRECTORY_SEPARATOR.$cl.'.php';
    if(file_exists($file)){
        require_once $file;
        return true;
    }
    return false;
});
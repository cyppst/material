<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use PhpConsole\Connector;

ChromePhp::log('This is just a log message');
ChromePhp::warn("This is a warning message " ) ;
ChromePhp::error("This is an error message" ) ;
ChromePhp::log($_SERVER);

// using labels
foreach ($_SERVER as $key => $value) {
    ChromePhp::log($key, $value);
}
$connector = Connector::getInstance();


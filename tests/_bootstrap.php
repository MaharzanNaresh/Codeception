<?php
defined('ROOT') || define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APPLICATION_ENV', 'testing');
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

new \Library\Application();
<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use think\Config;
require_once 'vendor/autoload.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/application/entity"), $isDevMode);

$dbParams = [
    'driver' => Config::get('database.driver') ? Config::get('database.driver') : 'pdo_mysql',
    'user' => Config::get('database.username') ? Config::get('database.username') : 'root',
    'password' => Config::get('database.password') ? Config::get('database.password') : '',
    'dbname' => Config::get('database.database') ? Config::get('database.database') : 'foo',
    'charset' => Config::get('database.charset') ? Config::get('database.charset') : 'utf8',
];

$entityManager = EntityManager::create($dbParams, $config);


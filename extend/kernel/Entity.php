<?php

namespace kernel;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Class Entity
 * @package kernel
 * @author 韩良 subrahmanyen@gmail.com
 */
class Entity
{
    private $instance;
    private $isDevMode = true;

    private function buildEntity()
    {
        $entity = Setup::createAnnotationMetadataConfiguration(array(APP_PATH . "/entity"), $this->isDevMode);
        $config = [
            'driver' => config('database.driver') ? config('database.driver') : 'pdo_mysql',
            'user' => config('database.username') ? config('database.username') : 'root',
            'password' => config('database.password') ? config('database.password') : '',
            'dbname' => config('database.database') ? config('database.database') : 'foo',
            'charset' => config('database.charset') ? config('database.charset') : 'utf8',
        ];

        return EntityManager::create($config, $entity);
    }

    public function getInstance()
    {
        if (null === $this->instance) {
            $this->instance = $this->buildEntity();
        }

        return $this->instance;
    }
}
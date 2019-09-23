<?php

namespace FBMS\Contas\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'minhascontas',
            'user' => 'alura',
            'password' => 'alura@123456'
        ];

      
        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($connection, $config);
    }
}

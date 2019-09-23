<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Infra\EntityManagerCreator;


$builder = new ContainerBuilder();

$builder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerCreator())->getEntityManager();
    }
]);
$container = $builder->build();

return $container; 
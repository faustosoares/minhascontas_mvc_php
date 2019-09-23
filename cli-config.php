<?php
use FBMS\Contas\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/vendor/autoload.php';

$entityManager = new EntityManagerCreator();

return ConsoleRunner::createHelperSet($entityManager->getEntityManager());

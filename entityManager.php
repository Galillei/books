<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "vendor/autoload.php";
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'bazilio',
    'dbname'   => 'books',
);
$argument = array();
$paths = array(__DIR__."application/models/Entity/");
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
$entityManager->getConfiguration()->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $entityManager->getConnection()->getSchemaManager()
)
);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($entityManager);
$metadata = $cmf->getAllMetadata();
//var_dump($metadata[0]);
$generator = new \Doctrine\ORM\Tools\EntityGenerator();
$generator->setGenerateAnnotations(true);
$generator->setAnnotationPrefix('');
$generator->setGenerateStubMethods(true);
$generator->setRegenerateEntityIfExists(false);
$generator->setUpdateEntityIfExists(true);
$generator->generate($metadata, 'application/models/Entity/');

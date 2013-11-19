<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initDoctrine()
    {
       require_once APPLICATION_PATH. '/../vendor/autoload.php';
        $config = new \Doctrine\ORM\Configuration();

        // Настройка кеша (используется ArrayCache)
        $cache = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // Устанавлмваем драйвер для схемы БД
        // Будем использовать аннотации
        $driver = $config->newDefaultAnnotationDriver(
            APPLICATION_PATH . '/models'
        );
        $config->setMetadataDriverImpl($driver);

        // Прокси
        $config->setProxyDir(APPLICATION_PATH . '/models/Entity/Proxies');
        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyNamespace('models\Entity\Proxies');

        // Создаем EntityManager
        // с параметрами из application.ini
        $connectionSettings = $this->getOption('doctrine');
        $conn = array(
            'driver'   => $connectionSettings['conn']['driv'],
            'user'     => $connectionSettings['conn']['user'],
            'password' => $connectionSettings['conn']['pass'],
            'dbname'   => $connectionSettings['conn']['dbname'],
            'host'     => $connectionSettings['conn']['host']
        );
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

        // Сохраним менеджер в реестре
        $registry = Zend_Registry::getInstance();
        $registry->entitymanager = $entityManager;

        return $entityManager;
    }
    public function _initView()
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        return $view;
    }

    public function _initJquery()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    }

}





<?php

namespace Academia;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Academia\Service\AlunoService;
use Academia\Service\AcademiaService;
class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig(){
        return [
            'factories' => array(
                'Academia\Service\AlunoService' => function($em){
                    return new AlunoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\AcademiaService' => function($em){
                    return new AcademiaService($em->get("Doctrine\ORM\EntityManager"));
                }
            )
        ];
    }
}

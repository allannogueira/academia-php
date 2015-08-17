<?php

namespace Academia;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Academia\Service\AlunoService;
use Academia\Service\AcademiaService;
use Academia\Service\TreinoService;
use Academia\Service\DietaService;
use Academia\Service\CepbrEnderecoService;
use Academia\Service\MedidaService;
use Academia\Service\AlimentoService;
use Academia\Service\InformativoService;
use Academia\Service\ProfissionalService;
use Academia\Service\FrequenciaService;
use Academia\Service\AparelhoService;
use Academia\Form\ProfissionalForm;
use Academia\Form\TreinoForm;
use Academia\Form\DietaForm;
use Academia\Form\MedidaForm;
use Academia\Form\FrequenciaForm;
use Academia\Form\AparelhoForm;
use Academia\Form\LoginForm;
use DoctrineModule\Authentication\Adapter\ObjectRepository;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        //toda vez que chamar AbstractActionController, será verificado se o está logado
        $sharedEvents = $eventManager->getSharedManager();
        $sharedEvents->attach("Zend\Mvc\Controller\AbstractActionController","dispatch", function($ev){
             //se está logado
            $authService = $ev->getApplication()->getServiceManager()->get('Zend\Authentication\AuthenticationService');
            if($authService->hasIdentity()){
                return;
            }

            //se estiver na index, não devo barrar
         //   echo $ev->getRouteMatch()->getParam('action');
            $action = $ev->getRouteMatch()->getParam('action');
            if($action == "login" || $action == "index" || $action == "logout"){
                return;
            }
            $t = $ev->getTarget();
            //acesso negado é redirecionado para login
           echo "Acesso Negado.";
            //se nao estiver logado
        },99);
       
        
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
                'Zend\Authentication\AuthenticationService' => function($em) {
                        // If you are using DoctrineORMModule:
                        $service = $em->get('doctrine.authenticationservice.orm_default');
                   //     $service->setAdapter($em->get('AuthAdapterAcademia'));
                        return $service;
                        
                },
          /*      'AuthAdapterAcademia' => function($sm) {
                    return new ObjectRepository(array(
                        'object_manager'      => 'Doctrine\ORM\EntityManager',
                        'identity_class'      => 'Application\Entity\Agent',
                        'identity_property'   => 'usuario',
                        'credential_property' => 'senha'
                    ));
                },*/
        
                'Academia\Service\AlunoService' => function($em){
                    return new AlunoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\AcademiaService' => function($em){
                    return new AcademiaService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\TreinoService' => function($em){
                    return new TreinoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\DietaService' => function($em){
                    return new DietaService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\CepbrEnderecoService' => function($em){
                    return new CepbrEnderecoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\MedidaService' => function($em){
                    return new MedidaService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\AlimentoService' => function($em){
                    return new AlimentoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\InformativoService' => function($em){
                    return new InformativoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\ProfissionalService' => function($em){
                    return new ProfissionalService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\AparelhoService' => function($em){
                    return new aparelhoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\ProfissionalForm' => function($em){
                    return new ProfissionalForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\TreinoForm' => function($em){
                    return new TreinoForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\DietaForm' => function($em){
                    return new DietaForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\MedidaForm' => function($em){
                    return new MedidaForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\FrequenciaService' => function($em){
                    return new FrequenciaService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\FrequenciaForm' => function($em){
                    return new FrequenciaForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\AparelhoForm' => function($em){
                    return new AparelhoForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\LoginForm' => function($em){
                    return new LoginForm($em->get("Doctrine\ORM\EntityManager"));
                }
            )
        ];
    }
}

<?php

namespace Academia;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Academia\Service\AlunoService;
use Academia\Service\AcademiaService;
use Academia\Service\ExercicioService;
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
use Academia\Form\ExercicioForm;
use Academia\Form\TreinoForm;
use Academia\Form\DietaForm;
use Academia\Form\MedidaForm;
use Academia\Form\FrequenciaForm;
use Academia\Form\AparelhoForm;
use Academia\Form\LoginForm;
use Academia\Form\EnderecoForm;
use Academia\Form\AlunoForm;
use Academia\Form\InformativoForm;
use DoctrineModule\Authentication\Adapter\ObjectRepository as ObjectRepositoryAdapter;
use DoctrineModule\Authentication\Storage\ObjectRepository as StorageObjectRepository;
use DoctrineModule\Options\Authentication;
use Zend\Authentication\Storage\Session;
use Academia\Controller\AcademiaController;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;


class Module implements FormElementProviderInterface
{
 
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
       
        //toda vez que chamar AbstractActionController, será verificado se o está logado
       /* $sharedEvents = $eventManager->getSharedManager();
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
       */
        
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
    
    public function getFormElementConfig()
    {
        return array(
            'initializers' => array(
                'ObjectManagerInitializer' => function ($element, $formElements) {
                    if ($element instanceof ObjectManagerAwareInterface) {
                        $services      = $formElements->getServiceLocator();
                        $entityManager = $services->get('Doctrine\ORM\EntityManager');

                        $element->setObjectManager($entityManager);
                    }
                },
            ),
            'factories' => array(
                'ExerciciosFieldset' => function($sm) {
            
            echo "lalala";
                    // I assume here that the Album\Model\AlbumTable
                    // dependency have been defined too

                   // $serviceLocator = $sm->getServiceLocator();
                   // $albumTable = $serviceLocator->get('Album\Model\AlbumTable');
                    $fieldset = new Academia\Form\ExerciciosFieldset();
                    return $fieldset;
                }
            )
        );
    }
    
    public function getServiceConfig(){
        return [
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function($em) {
            
                        // If you are using DoctrineORMModule:
                        return $em->get('doctrine.authenticationservice.orm_default');
                },
                        //utilizado em LoginController.php
                'adapters' => function($em){
                    $adapterAcademia = new ObjectRepositoryAdapter([
                        'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                        'identity_class' => 'Academia\Entity\Academia',
                        'identity_property' => 'usuario',
                        'credential_property' => 'senha',
                        'storage' => 'DoctrineModule\Authentication\Storage\Session',
                    ]);
                    
                    $adapterAluno = new ObjectRepositoryAdapter([
                        'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                        'identity_class' => 'Academia\Entity\Aluno',
                        'identity_property' => 'usuario',
                        'credential_property' => 'senha',
                        'storage' => 'DoctrineModule\Authentication\Storage\Session',
                    ]);
                    
                    $adapterAdmin = new ObjectRepositoryAdapter([
                        'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                        'identity_class' => 'Academia\Entity\Admin',
                        'identity_property' => 'usuario',
                        'credential_property' => 'senha',
                        'storage' => 'DoctrineModule\Authentication\Storage\Session',
                    ]);
                    
                    $adapterProfissional = new ObjectRepositoryAdapter([
                        'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                        'identity_class' => 'Academia\Entity\Profissional',
                        'identity_property' => 'usuario',
                        'credential_property' => 'senha',
                        'storage' => 'DoctrineModule\Authentication\Storage\Session',
                    ]);
                    
                    return [$adapterAluno,$adapterAcademia,$adapterAdmin,$adapterProfissional];
                },
                'storages' => function($em){
                    $storageAluno = new StorageObjectRepository(
                        new Authentication([
                                'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                                'identity_class' => 'Academia\Entity\Aluno',
                                'identity_property' => 'usuario',
                                'credential_property' => 'senha',
                                'storage' => new Session(),
                        ])
                    );
                    
                    $storageAcademia = new StorageObjectRepository(
                        new Authentication([
                                'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                                'identity_class' => 'Academia\Entity\Academia',
                                'identity_property' => 'usuario',
                                'credential_property' => 'senha',
                                'storage' => new Session(),
                        ])
                    );
                    
                    $storageAdmin = new StorageObjectRepository(
                        new Authentication([
                                'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                                'identity_class' => 'Academia\Entity\Admin',
                                'identity_property' => 'usuario',
                                'credential_property' => 'senha',
                                'storage' => new Session(),
                        ])
                    );
                    
                    $storageProfissional = new StorageObjectRepository(
                        new Authentication([
                                'object_manager' => $em->get("Doctrine\ORM\EntityManager"),
                                'identity_class' => 'Academia\Entity\Profissional',
                                'identity_property' => 'usuario',
                                'credential_property' => 'senha',
                                'storage' => new Session(),
                        ])
                    );
                    return [$storageAluno,$storageAcademia,$storageAdmin,$storageProfissional];
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
                    
                    /*$form = $em->get("treino-form");
                    $form->setObjectManager($em->get("Doctrine\ORM\EntityManager"));*/
                    
                    $form = $em->get('FormElementManager')->get('treino-form');
                     //$form->setObjectManager($em->get("Doctrine\ORM\EntityManager"));
                   // return new TreinoForm($em->get("Doctrine\ORM\EntityManager"));
                    return $form;
                },
                'Academia\Form\ExercicioForm' => function($em){
                    return new ExercicioForm($em->get("Doctrine\ORM\EntityManager"));
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
                'Academia\Service\ExercicioService' => function($em){
                    return new ExercicioService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\FrequenciaForm' => function($em){
                    return new FrequenciaForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\AparelhoForm' => function($em){
                    return new AparelhoForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\EnderecoFieldset' => function($em){
                    return new EnderecoFieldset($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\AlunoForm' => function($em){
                   
                    return new AlunoForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\LoginForm' => function($em){
                   // die('Module.php');
                    return new LoginForm($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Form\InformativoForm' => function($em){
                 //    die('Module.php');
                    return new InformativoForm($em->get("Doctrine\ORM\EntityManager"));
                }
            )
        ];
    }
}

<?php

namespace Academia;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Academia\Service\AlunoService;
use Academia\Service\AcademiaService;
use Academia\Service\ExercicioService;
use Academia\Service\TreinoService;
use Academia\Service\DietaGeralService;
use Academia\Service\DietaAlimentoService;
use Academia\Service\DietaAlunoService;
use Academia\Service\CepbrEnderecoService;
use Academia\Service\MedidaService;
use Academia\Service\AlimentoService;
use Academia\Service\InformativoService;
use Academia\Service\ProfissionalService;
use Academia\Service\FrequenciaService;
use Academia\Service\TreinoGeralService;
use Academia\Service\MusculoService;
use Academia\Service\AparelhoService;
use Academia\Service\TreinoExercicioService;

use Zend\ModuleManager\Feature\FormElementProviderInterface;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;

use Zend\Validator\AbstractValidator;
use Zend\I18n\Translator\Translator;

class Module implements FormElementProviderInterface
{
 
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
       
        $t = $e->getTarget();
        $t->getEventManager()->attach($t->getServiceManager()->get('ZfcRbac\View\Strategy\RedirectStrategy'));
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
        //Esse é o código para a tradução

        //Pega o serviço translator definido no arquivo module.config.php (aliases)
       // $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator = new Translator();
        //Define o local onde se encontra o arquivo de tradução de mensagens
        $translator->addTranslationFile(
        'phpArray',
        '/vendor/zendframework/zendframework/resources/languages/pt_BR/Zend_Validate.php',
        'default',
        'pt_BR'
       );
        //Define o local (você também pode definir diretamente no método acima
        $translator->setLocale('pt_BR');
        //Define a tradução padrão do Validator
       AbstractValidator::setDefaultTranslator(
            new \Zend\Mvc\I18n\Translator($translator)
        );
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
            'invokables' => array(
                'AlunoForm' => 'Academia\Form\AlunoForm',
                'AcademiaForm' => 'Academia\Form\AcademiaForm',
                'EnderecoFieldset' => 'Academia\Form\EnderecoFieldset',
                'CepbrEnderecoFieldset' => 'Academia\Form\CepbrEnderecoFieldset',
                'CepbrCidadeFieldset' => 'Academia\Form\CepbrCidadeFieldset',
                'AlunoForm' => 'Academia\Form\AlunoForm',
                'AcademiaFieldset' => 'Academia\Form\AcademiaFieldset',
                'FinalidadeFieldset' => 'Academia\Form\FinalidadeFieldset',
                'LoginFieldset' => 'Academia\Form\LoginFieldset',
                'ProfissionalForm' => 'Academia\Form\ProfissionalForm',                
                'AlunoFieldset' => 'Academia\Form\AlunoFieldset',
                'MedidaForm' => 'Academia\Form\MedidaForm',
                'FrequenciaForm' => 'Academia\Form\FrequenciaForm',
                'MusculoForm' => 'Academia\Form\MusculoForm',
                'ExercicioFieldset' => 'Academia\Form\ExercicioFieldset',
                'TreinoExercicioForm' => 'Academia\Form\TreinoExercicioForm',
                'FiltroTreinoExercicioForm' => 'Academia\Form\FiltroTreinoExercicioForm',
                'FiltroTreinoAlunoForm' => 'Academia\Form\FiltroTreinoAlunoForm',
                'FiltroAlunoForm' => 'Academia\Form\FiltroAlunoForm',
            ),
            'initializers' => array(
                'ObjectManagerInitializer' => function ($element, $formElements) {
                    if ($element instanceof ObjectManagerAwareInterface) {
                        $services = $formElements->getServiceLocator();
                        $entityManager = $services->get('Doctrine\ORM\EntityManager');
                        $element->setObjectManager($entityManager);
                    }
                },
            ),
                        
           /* 'factories' => array(
                'CepbrBairroFieldset' => function($sm){
                    $fieldset = new Academia\Form\CepbrBairroFieldset();
                    return $fieldset;
                },
                'ExerciciosFieldset' => function($sm) {
                    // I assume here that the Album\Model\AlbumTable
                    // dependency have been defined too

                   // $serviceLocator = $sm->getServiceLocator();
                   // $albumTable = $serviceLocator->get('Album\Model\AlbumTable');
                    $fieldset = new Academia\Form\ExerciciosFieldset();
                    return $fieldset;
                }
            )*/
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
                },
                'Academia\Service\TreinoService' => function($em){
                    return new TreinoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\DietaGeralService' => function($em){
                    return new DietaGeralService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\DietaAlimentoService' => function($em){
                    return new DietaAlimentoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\DietaAlunoService' => function($em){
                    return new DietaAlunoService($em->get("Doctrine\ORM\EntityManager"));
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
               
                'Academia\Service\FrequenciaService' => function($em){
                    return new FrequenciaService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\ExercicioService' => function($em){
                    return new ExercicioService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\TreinoGeralService' => function($em){
                    return new TreinoGeralService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\MusculoService' => function($em){
                    return new MusculoService($em->get("Doctrine\ORM\EntityManager"));
                },
                'Academia\Service\TreinoExercicioService' => function($em){
                    return new TreinoExercicioService($em->get("Doctrine\ORM\EntityManager"));
                },
              
            )
        ];
    }
}

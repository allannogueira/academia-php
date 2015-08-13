<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
              'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
              'cache' => 'array',
              'paths' => array(__DIR__ . '/../src/Academia/Entity')
            ),

            'orm_default' => array(
              'drivers' => array(
                    'Academia\Entity' => 'application_entities'
              ) 
            )
        ),
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Academia\Entity\Academia',
                'identity_property' => 'id',
                'credential_property' => 'senha',
            ),
        )
    ),
    
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Academia\Controller\Index' => 'Academia\Controller\IndexController',           
            'Academia\Controller\Aluno' => 'Academia\Controller\AlunoController',
            'Academia\Controller\Academia' => 'Academia\Controller\AcademiaController',
            'Academia\Controller\Treino' => 'Academia\Controller\TreinoController',
            'Academia\Controller\Dieta' => 'Academia\Controller\DietaController',
            'Academia\Controller\CepbrEndereco' => 'Academia\Controller\CepbrEnderecoController',
            'Academia\Controller\CadastrarMedida' => 'Academia\Controller\MedidaController',
            'Academia\Controller\Alimento' => 'Academia\Controller\AlimentoController',
            'Academia\Controller\Informativo' => 'Academia\Controller\InformativoController',
            'Academia\Controller\Profissional' => 'Academia\Controller\ProfissionalController',
            'Academia\Controller\Frequencia' => 'Academia\Controller\FrequenciaController',
            'Academia\Controller\Aparelho' => 'Academia\Controller\AparelhoController',
            'Academia\Controller\Login' => 'Academia\Controller\LoginController'
            
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/layoutAjax'           => __DIR__ . '/../view/layout/layoutAjax.phtml',
            'application/index/index' => __DIR__ . '/../view/academia/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',                     
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        )
    ),
	 // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'home' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Index',
                         'action'     => 'index',
                     ),
                 ),
             ),
            'cadastrarAluno' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarAluno[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Aluno',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
		 'cadastrarProfissional' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarProfissional[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Profissional',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
              'cadastrarAcademia' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarAcademia[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Academia',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarTreino' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarTreino[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Treino',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarDieta' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarDieta[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Dieta',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarMedida' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarMedida[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\CadastrarMedida',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarAlimento' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarAlimento[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Alimento',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             
             'cadastrarFrequencia' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarFrequencia[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Frequencia',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarInformativo' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarInformativo[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Informativo',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'login' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/Login[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Login',
                         'action'     => 'index',
                     ),
                 ),
             ),
              'cepbrEndereco' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CepbrEndereco[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\CepbrEndereco',
                         'action'     => 'listar',
                     ),
                 ),
             ),
             'cadastrarEquipamento' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarEquipamento[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Equipamento',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
             'cadastrarAparelho' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarAparelho[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Academia\Controller\Aparelho',
                         'action'     => 'inserir',
                     ),
                 ),
             ),
         ),
     ),
);

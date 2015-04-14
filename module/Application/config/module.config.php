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
		  'paths' => array(__DIR__ . '/../src/Application/Model')
		),

		'orm_default' => array(
		  'drivers' => array(
			'Application\Model' => 'application_entities'
		  )
	))),
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
        'locale' => 'en_US',
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
            'Application\Controller\Index' => 'Application\Controller\IndexController',           
            'Application\Controller\CadastrarAluno' => 'Application\Controller\CadastrarAlunoController',       
            'Application\Controller\CadastrarProfissional' => 'Application\Controller\CadastrarProfissionalController',       
            'Application\Controller\CadastrarAcademia' => 'Application\Controller\CadastrarAcademiaController',       
            'Application\Controller\CadastrarTreino' => 'Application\Controller\CadastrarTreinoController',       
            'Application\Controller\CadastrarDieta' => 'Application\Controller\CadastrarDietaController',       
            'Application\Controller\CadastrarMedida' => 'Application\Controller\CadastrarMedidaController', 
            'Application\Controller\CadastrarAlimento' => 'Application\Controller\CadastrarAlimentoController', 
            'Application\Controller\CadastrarFrequencia' => 'Application\Controller\CadastrarFrequenciaController', 
            'Application\Controller\CadastrarAviso' => 'Application\Controller\CadastrarAvisoController', 
            'Application\Controller\Login' => 'Application\Controller\LoginController', 

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
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',            
            'application/cadastrar-aluno/listar' => __DIR__ . '/../view/application/cadastrar-aluno/listar/listar-aluno.phtml',            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
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
                         'controller' => 'Application\Controller\Index',
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
                         'controller' => 'Application\Controller\CadastrarAluno',
                         'action'     => 'cadastrarAluno',
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
                         'controller' => 'Application\Controller\CadastrarProfissional',
                         'action'     => 'cadastrarProfissional',
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
                         'controller' => 'Application\Controller\CadastrarAcademia',
                         'action'     => 'cadastrarAcademia',
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
                         'controller' => 'Application\Controller\CadastrarTreino',
                         'action'     => 'cadastrarTreino',
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
                         'controller' => 'Application\Controller\CadastrarDieta',
                         'action'     => 'cadastrarDieta',
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
                         'controller' => 'Application\Controller\CadastrarMedida',
                         'action'     => 'cadastrarMedida',
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
                         'controller' => 'Application\Controller\CadastrarAlimento',
                         'action'     => 'cadastrarAlimento',
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
                         'controller' => 'Application\Controller\CadastrarFrequencia',
                         'action'     => 'cadastrarFrequencia',
                     ),
                 ),
             ),
             'cadastrarAviso' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/CadastrarAviso[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Application\Controller\CadastrarAviso',
                         'action'     => 'CadastrarAviso',
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
                         'controller' => 'Application\Controller\Login',
                         'action'     => 'Login',
                     ),
                 ),
             ),
         ),
     ),
);

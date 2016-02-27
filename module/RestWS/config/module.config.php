<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'RestWS\Controller\AlbumRest' => 'RestWS\Controller\AlbumRestController',
            'RestWS\Controller\Login' => 'RestWS\Controller\LoginController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album-rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album-rest[/:action][/:id][.:formatter]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RestWS\Controller\AlbumRest',
                    ),
                ),
            ),
             'wsLogin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/wsLogin[/:action][/:id][.:formatter]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RestWS\Controller\Login',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        /*'template_path_stack' => array(
            'album-rest' => __DIR__ . '/../view',
        ),*/
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'RestWS\Controller\AlbumRest' => 'RestWS\Controller\AlbumRestController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album-rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album-rest[/:id][/:action][.:formatter]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RestWS\Controller\AlbumRest',
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
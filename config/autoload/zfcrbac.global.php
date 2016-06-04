<?php
return [
    'zfc_rbac' => [
        // 'identity_provider' => 'ZfcRbac\Identity\AuthenticationIdentityProvider',
        'guest_role' => 'visitante',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                /*Pagina inicial*/
                'home'    => ['visitante'],
                /*Cadastros e consultas*/
                'aluno'       => ['admin'],
                'profissional'       => ['admin'],
                'academia'       => ['admin'],
                'treinoGeral'       => ['admin'],
                'musculo'       => ['admin'],
                'exercicio'       => ['admin'],
                'treinoExercicio'       => ['admin'],
                'treino'       => ['admin'],
                'dietaGeral'       => ['admin'],
                'dietaAlimento'       => ['admin'],
                'dietaAluno'       => ['admin'],
                'medida'       => ['admin'],
                'alimento'       => ['admin'],
                'frequencia'       => ['admin'],
                'aparelho'       => ['admin'],
                /*Relatorios*/
                'bugReport'       => ['admin'],
                'massaMuscular'       => ['admin'],
                'frequencia'       => ['admin'],
                'atividade'       => ['admin'],
                
            ]/*,
            'ZfcRbac\Guard\ControllerGuard' => [
                [
                    'controller' => 'Academia\Entity\Login',
                    'roles'      => ['admin','visitante']
                ],
            ]*/
        ],
        // 'protection_policy' => \ZfcRbac\Guard\GuardInterface::POLICY_ALLOW,
        'role_provider' => [
            'ZfcRbac\Role\InMemoryRoleProvider' => [
                'admin' => [
                    'children'    => ['usuario'],
                    'permissions' => ['admin','deleteOthers','autorizar']
                ],
                'usuario' => [
                    'children'    => ['visitante'],
                    'permissions' => ['usuario','delete']
                ],
                'visitante'
            ]
        ],
        'unauthorized_strategy' => [
            'template' => 'error/403'
        ],
        'redirect_strategy' => [
            'redirect_when_connected' => true,
            'redirect_to_route_connected' => 'error/403',
            'redirect_to_route_disconnected' => 'home',
            'append_previous_uri' => false,
            'previous_uri_query_key' => 'redirect'
        ],
        // 'guard_manager'               => [],
        // 'role_provider_manager'       => []
    ]
];
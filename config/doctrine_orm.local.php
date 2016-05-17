<?php 

return array( 
      'doctrine' => array(
        'driver' => array(
              __NAMESPACE__ .'orm_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' =>   __NAMESPACE__ .'orm_driver',
                    'Academia\Entity' =>   __NAMESPACE__ .'orm_driver',
                )
            )
        ),
          
        'connection' => array(
             'orm_default' => array( 
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver', 
                'params' => array( 
                    'host' => '192.185.176.178', 
                    'port' => '3306', 
                    'user' => 'ddc_allan2', 
                    'password' => 'Aa@123456', 
                    'dbname' => 'ddc_academia', 
                     'charset' => 'utf8',
                 ) 
             )
        )
    )

);

    ?>

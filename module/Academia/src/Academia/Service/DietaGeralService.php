<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;


/**
 * Description of DietaGeralService
 *
 * @author Allan
 */
class DietaGeralService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\DietaGeral';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
}

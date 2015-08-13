<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;


/**
 * Description of DietaService
 *
 * @author Allan
 */
class DietaService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Dieta';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
}

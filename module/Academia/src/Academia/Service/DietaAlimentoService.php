<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;


/**
 * Description of DietaAlimentoService
 *
 * @author Allan
 */
class DietaAlimentoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\DietaAlimento';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
}

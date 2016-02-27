<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;


/**
 * Description of DietaAlunoService
 *
 * @author Allan
 */
class DietaAlunoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\DietaAluno';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
   
}

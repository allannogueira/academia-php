<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;


/**
 * Description of AlunoService
 *
 * @author Allan
 */
class AlimentoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Alimento';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
}

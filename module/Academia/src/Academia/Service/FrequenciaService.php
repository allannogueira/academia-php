<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Frequencia;


/**
 * Description of AlunoService
 *
 * @author Allan
 */
class FrequenciaService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Frequencia';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
        return parent::save($data);
    }
}

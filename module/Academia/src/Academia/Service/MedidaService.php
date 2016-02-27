<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Description of AlunoService
 *
 * @author Allan
 */
class MedidaService extends AbstractService{
    private $data;
    
    public function __construct(EntityManager $em){
        
        $this->entity = 'Academia\Entity\Medida';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
    private function setData(Array $data){
        $this->data = $data;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function save(Array $data = array())
    {
       $entity = parent::save($data);
       return $entity;
    }
 
    
}

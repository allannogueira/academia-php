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
        
        $this->entity = 'Academia\Entity\Medidas';
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
       $this->setData($data);
       $this->saveIdMedidaAluno($entity);
       return $entity;
    }
    
    public function saveIdMedidaAluno(\Academia\Entity\Medidas $entityMedidas){
        $idAluno = $this->getData()['aluno'];
        
         $entity = $this->getEm()->getReference("\Academia\Entity\Aluno",$idAluno);
         $entity->setMedidas($entityMedidas);
        
         $this->em->persist($entity);
        $this->em->flush();
    }
    
}

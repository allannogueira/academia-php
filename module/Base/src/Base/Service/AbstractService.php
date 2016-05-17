<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\StdLib\Hydrator\ClassMethods;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractService
 *
 * @author Allan
 */
class AbstractService {
    protected $em;
    protected $entity;
    
    public function __construct(EntityManager $em){
        $this->em = $em;
    }
    
    public function getEm(){
        return $this->em;
    }
    
    public function preSave(Array $data = array())
    {
        if(isset($data['id'])){//atualiza
             
           $entity = $this->em->getReference($this->entity,$data['id']);
            $hydrator = new DoctrineHydrator($this->getEm());
            $hydrator->hydrate($data, $entity);
        }else{
           $entity = new $this->entity($data,$this->getEm());
        }
        
       // $this->em->persist($entity);
        //$this->em->flush();
        
        return $entity;
    }
    
    public function save(Array $data = array())
    {
        if(isset($data['id'])){//atualiza
             
           $entity = $this->em->getReference($this->entity,$data['id']);
            $hydrator = new DoctrineHydrator($this->getEm());
            $hydrator->hydrate($data, $entity);
        }else{
           $entity = new $this->entity($data,$this->getEm());
        }
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
    
    public function remove(Array $data = array()){
        $entity = $this->em->getRepository($this->entity)->findOneBy($data);
        
        if($entity){
            $this->em->remove($entity);
            $this->em->flush();
            
            return $entity;
        }
    }
    
    public function getId(){
        $this->em->getConnection()->lastInsertId();
    }
}

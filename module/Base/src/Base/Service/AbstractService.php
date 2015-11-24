<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\StdLib\Hydrator\ClassMethods;

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
    
    public function save(Array $data = array())
    {
       // print_r($entity);
       // exit(0);
      //  echo var_dump($data); die;
        if(isset($data['id'])){//atualiza
             //echo var_dump($data);
           $entity = $this->em->getReference($this->entity,$data['id']);
           
           $hydrator = new ClassMethods();
           $hydrator->hydrate($data, $entity);
           
           
          
        }else{//cadastra um novo
         //   echo "<pre>".var_dump($this->entity)."</pre>"; exit;
           $entity = new $this->entity($data);
           $hydrator = new ClassMethods();
           $hydrator->hydrate($data, $entity);
           
        }
        
      /*  echo "<pre>";
        echo var_dump($entity);
        exit(0);
        echo "</pre>";*/
        
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

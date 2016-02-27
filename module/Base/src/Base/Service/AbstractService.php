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
    
    public function save(Array $data = array())
    {
        echo var_dump($data);
       // print_r($entity);
       // exit(0);
      //  echo var_dump($data); die;
        if(isset($data['id'])){//atualiza
             
           $entity = $this->em->getReference($this->entity,$data['id']);
           
          // $data["id_endereco"]["cepbr_endereco_cep"] = $hydrator->hydrate($data["id_endereco"]["cepbr_endereco_cep"],new \Academia\Entity\CepbrEndereco($data["id_endereco"]["cepbr_endereco_cep"]));
          // $data["id_endereco"]["cepbr_endereco_cep"]["id_bairro"] = $hydrator->hydrate($data["id_endereco"]["cepbr_endereco_cep"]["id_bairro"],new \Academia\Entity\CepbrBairro($data["id_endereco"]["cepbr_endereco_cep"]["id_bairro"]));
          // echo var_dump($data["id_endereco"]);
          // $data["id_endereco"] = $hydrator->hydrate($data["id_endereco"],new \Academia\Entity\Endereco($data["id_endereco"]));
          // echo var_dump($data["id_endereco"]);
            /*
            $array["id_endereco"]["cepbr_endereco_cep"]["id_bairro"] = $array["id_endereco"]["cepbr_endereco_cep"]["id_bairro"]->toArray();                           
            $array["id_endereco"]["cepbr_endereco_cep"]["id_cidade"] = $array["id_endereco"]["cepbr_endereco_cep"]["id_cidade"]->toArray();
            $array["id_endereco"]["cepbr_endereco_cep"]["id_cidade"]["uf"] = $array["id_endereco"]["cepbr_endereco_cep"]["id_cidade"]["uf"]->toArray();
            $array["id_endereco"]["id_tipo_endereco"] = $array["id_endereco"]["id_tipo_endereco"]->toArray();
            
             */
           //$data = $hydrator->hydrate($data, $entity);
           
            $hydrator = new DoctrineHydrator($this->getEm());
            $hydrator->hydrate($data, $entity);

          

          
        }else{//cadastra um novo
         //   echo "<pre>".var_dump($this->entity)."</pre>"; exit;
          // $entity = new $this->entity($data);
           /*$hydrator = new ClassMethods();
           $hydrator->hydrate($data, $entity);*/
           $entity = new $this->entity($data,$this->getEm());
           
         /*  $hydrator = new DoctrineHydrator($this->getEm(), $this->entity);
           $hydrator->hydrate($data, $entity);*/
           
        }
        
        /*echo "<pre>";
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

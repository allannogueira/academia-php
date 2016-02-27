<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
/**
 * Description of AbstractEntity
 *
 * @author Allan
 */
abstract class AbstractEntity{
    //put your code here
    public function __construct(Array $data = array(),$em = ""){
        if($em != ""){
            $hydrator = new DoctrineHydrator($em);
            $hydrator->hydrate($data, $this);
        }
       // echo var_dump($this);exit;
    }
    
    public function toArray($em){
        $hydrator = new DoctrineHydrator($em);
        return $hydrator->extract($this);
    }
}

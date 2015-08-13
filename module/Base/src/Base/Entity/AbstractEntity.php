<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of AbstractEntity
 *
 * @author Allan
 */
abstract class AbstractEntity{
    //put your code here
    public function __construct(Array $options = array()){
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
       // echo var_dump($this);exit;
    }
    
    public function toArray(){
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }
}

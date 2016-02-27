<?php
namespace Academia\Form;

use Academia\Entity\CepbrBairro;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnderecoFieldset
 *
 * @author Allan
 */
class CepbrEnderecoFilhoFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    public $objectManager;
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('cepbr_endereco_cep');
        $this
        //     ->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new CepbrBairro())
         ;
    }
    
    public function init(){
       
        
        
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

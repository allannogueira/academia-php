<?php
namespace Academia\Form;

use Academia\Entity\Endereco;
use Zend\Form\Fieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
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
class EnderecoFieldset extends Fieldset implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct("idEndereco");
       
    }
    
    public function init(){
         $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Endereco())
         ;

        $this->setLabel('Endereço');
        $this->add(array(
             'type' => 'hidden',
             'name' => 'idEndereco'
         ));
        
      
        $this->add(array(
             'type' => 'Academia\Form\CepbrEnderecoFieldset'         
            
         ));
        
        $this->add(array(
             'name' => 'rua',
             'options' => array(
                 'label' => 'Logradouro',
             ),
             'attributes' => array(
                 'required' => 'required',
             ),
         ));
        
        $this->add(array(
             'name' => 'numero',
             'options' => array(
                 'label' => 'Numero',
             ),
             'attributes' => array(
                 'required' => 'required',
             ),
         ));
        
        $this->add(array(
             'name' => 'complemento',
             'options' => array(
                 'label' => 'Complemento',
             )
         ));
        
        $this->add(array(
             'type' => 'Academia\Form\TipoEnderecoFieldset'
         ));
    }

      public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

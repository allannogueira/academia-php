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

        $this->add([
           'name' => 'series',
           'type' => 'text',
           'options' => [
               'label' => 'Series',
           ]
       ]);
       
       $this->add([
           'name' => 'repeticoes',
           'type' => 'text',
           'options' => [
               'label' => 'Repetições',
           ]
       ]);
       
       $this->add([
           'name' => 'intervalo',
           'type' => 'text',
           'options' => [
               'label' => 'Intervalo',
           ]
       ]);
    }

      public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

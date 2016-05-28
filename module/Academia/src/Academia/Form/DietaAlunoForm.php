<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Academia\Entity\DietaAluno;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class DietaAlunoForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
    }
    
    public function init(){
        $this
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new DietaAluno())
        ;
        $this->setAttribute('class', 'form-inline');
        $this->add([
           'name' => 'idDietaAluno',
           'type' => 'hidden'
       ]);
       
       
         
          $this->add([
           'name' => 'dataIniVig',
           'type' => 'date',
           'options' => [
               'label' => 'Data Início',
           ],
            'attributes' => [
                'required' => 'true'
            ]
       ]);
          
    /*    $this->add([
           'name' => 'dataFimVig',
           'type' => 'date',
           'options' => [
               'label' => 'Data Fim',
           ],
            'attributes' => [
                'required' => 'true'
            ]
       ]);*/

          $this->add(array(
             'type' => 'Academia\Form\AlunoFieldset'
         ));
         
         $this->add(array(
             'type' => 'Academia\Form\DietaGeralFieldset'
         ));
         
       $this->add(array(
             'type' => 'Zend\Form\Element\Csrf',
             'name' => 'csrf',
         ));
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Salvar',
           ],
           'attributes' => [
               'class' => 'btn-primary'
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

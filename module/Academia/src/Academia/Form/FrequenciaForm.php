<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Academia\Entity\FrequenciaAluno;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

class FrequenciaForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct()
    {
        parent::__construct('frequencia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
    }
    
    public function init(){
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
             ->setObject(new FrequenciaAluno())
           //  ->setInputFilter(new AlunoFilter())
         ;
        $this->setAttribute('class', 'form-inline');
        $this->add([
            'name' => 'idFrequenciaAluno',
            'type' => 'hidden'
        ]);

        
        
        $this->add([
           'name' => 'dataPresenca',
           'options' => [
               'label' => 'Data de presença',
                'format'=>'Y-m-d'
           ],
            'type'  => 'date'
       ]);
        
       $this->add(['type' => 'Academia\Form\AlunoFieldset']);
      
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Marcar Presença'
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

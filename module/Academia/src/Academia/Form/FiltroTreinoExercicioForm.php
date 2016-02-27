<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Academia\Entity\TreinoExercicio;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class FiltroTreinoExercicioForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
    }
    
    public function init(){
        $this
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new TreinoExercicio())
        ;    
        
        $this->add([
           'type' => 'Academia\Form\TreinoGeralFieldset'
           
        ]);
        
        $this->add(array(
             'type' => 'Academia\Form\ExerciciosFieldset'
        ));
        
       
       $this->add(array(
             'type' => 'Zend\Form\Element\Csrf',
             'name' => 'csrf',
         ));
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Buscar',
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

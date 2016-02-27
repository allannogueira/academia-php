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

class TreinoExercicioForm extends Form implements ObjectManagerAwareInterface
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
           'name' => 'idTreinoExercicio',
           'type' => 'hidden'
       ]);
         
         $this->add([
           'type' => 'Academia\Form\TreinoGeralFieldset'
           
       ]);
         
       
       $this->add([
           'name' => 'serie',
           'type' => 'number',
           'options' => [
               'label' => 'Série',
           ]
       ]);
       
        $this->add([
           'name' => 'repeticao',
           'type' => 'number',
           'options' => [
               'label' => 'Repetição',
           ]
       ]);
        
        $this->add([
           'name' => 'intervalo',
           'type' => 'number',
           'options' => [
               'label' => 'Intervalo (tempo em segundos)',
           ]
       ]);
        
        $this->add([
           'name' => 'peso',
           'type' => 'number',
           'options' => [
               'label' => 'Peso (kg)',
           ]
       ]);
        
        
        $this->add(array(
             'type' => 'Academia\Form\ExerciciosFieldset'
        ));
        
        /* $this->add(array(
           'type' => 'Zend\Form\Element\Collection',
           'name' => 'Exercicio',
           'options' => array(
               'label' => 'Escolha exercicios para esse treino',
               'count' => 1,
               'allow_add' => true,
               'target_element' => array(
                   'type' => 'Academia\Form\ExerciciosFieldset',
               ),
           ),
       ));*/
       
      /* $this->add(array(
             'type' => 'Academia\Form\MusculoFieldset'
        ));
       */
       
       $this->add(array(
             'type' => 'Zend\Form\Element\Csrf',
             'name' => 'csrf',
         ));
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Salvar',
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

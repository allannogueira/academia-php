<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Academia\Entity\Aluno;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ExercicioForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
    }
    
    public function init(){
        $this
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new Aluno())
        ;             
        $this->setAttribute('class', 'form-inline');
         $this->add([
           'name' => 'idExercicio',
           'type' => 'hidden'
       ]);
         
         $this->add([
           'name' => 'nomeExercicio',
           'type' => 'text',
           'options' => [
               'label' => 'Nome Exercicio',
           ]
       ]);
         
       $this->add([
           'name' => 'descricao',
           'type' => 'text',
           'options' => [
               'label' => 'Descrição',
           ]
       ]);
       
       $this->add(array(
             'type' => 'Academia\Form\MusculoFieldset'
        ));
       
        $this->add(array(
             'type' => 'Academia\Form\AcademiaFieldset'
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

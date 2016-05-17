<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

class InformativoForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;
    
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('informativo');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
    }
    
    public function init(){
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
           //  ->setInputFilter(new AlunoFilter())
         ;
        $this->setAttribute('class', 'form-inline');
         $this->add(['type' => 'Academia\Form\AlunoFieldset']);
         $this->add(['type' => 'Academia\Form\AcademiaFieldset']);
        
       $this->add([
           'name' => 'descricao',
           'type' => 'textarea',
           'options' => [
               'label' => 'Descricao',
           ]
       ]);
       
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

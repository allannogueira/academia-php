<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Academia\Entity\Profissional;
use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ProfissionalForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
    }
    
    public function init(){
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Profissional())
         ;
        
        
        $this->setAttribute('class', 'form-inline');
        
        $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       
       $this->add([
           'name' => 'sobrenome',
           'type' => 'text',
           'options' => [
               'label' => 'Sobrenome',
           ]
       ]);
       
       $this->add([
           'name' => 'dataNasc',
           'type' => 'date',
           'options' => [
               'label' => 'Data Nascimento',
           ]
       ]);
       
       $this->add([
           'name' => 'telefone',
           'type' => 'text',
           'options' => [
               'label' => 'Telefone',
           ]
       ]);
       
       $this->add([
           'name' => 'celular',
           'type' => 'text',
           'options' => [
               'label' => 'Celular',
           ]
       ]);
       
       $this->add([
           'name' => 'rg',
           'type' => 'text',
           'options' => [
               'label' => 'RG',
           ]
       ]);
       
       $this->add([
           'name' => 'cpf',
           'type' => 'text',
           'options' => [
               'label' => 'CPF',
           ]
       ]);
       
        $this->add(array(
             'type' => 'Academia\Form\AcademiaFieldset'
         ));
         
        $this->add(array(
             'type' => 'Academia\Form\LoginFieldset'
         ));
     
        $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset'
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

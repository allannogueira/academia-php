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
use Academia\Entity\Aluno;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class AlunoForm extends Form implements ObjectManagerAwareInterface
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
        
         $this->add([
           'name' => 'idAluno',
           'type' => 'hidden'
       ]);
            
        $this->add(array(
             'type' => 'Academia\Form\AcademiaFieldset'
         ));

         $this->add(array(
             'type' => 'Academia\Form\FinalidadeFieldset'
         ));
          
       $this->add([
           'name' => 'nomeAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       $this->add([
           'name' => 'sobrenomeAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Sobrenome',
           ]
       ]);
       
       $this->add([
           'name' => 'telefoneAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Telefone',
           ]
       ]);
       
       $this->add([
           'name' => 'celularAluno',
           'type' => 'text',
           'options' => [
               'label' => 'Celular',
           ]
       ]);
       
       $this->add([
           'name' => 'dataNasc',
           'type' => 'date',
           'options' => [
               'label' => 'Data de Nascimento',
           ]
       ]);
       
       $this->add([
           'name' => 'cpf',
           'type' => 'text',
           'options' => [
               'label' => 'CPF',
           ]
       ]);
       
       $this->add([
           'name' => 'rg',
           'type' => 'text',
           'options' => [
               'label' => 'RG',
           ]
       ]);
       
     
       
       $this->add(array(
             'type' => 'Academia\Form\LoginFieldset'
         ));
       
       $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset'
         ));
      //  $this->add(new EnderecoFieldset());
       
       
       
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

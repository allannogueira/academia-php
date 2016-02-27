<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Academia\Entity\Medida;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class MedidaForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
     public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
        
    }            
        
    public function init(){
        $this
            ->setAttribute('method', 'POST')
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new Medida())
         ;
        
        $this->add([
            'name' => 'idMedida',
            'type' => 'hidden'
        ]);
        
        $this->add(array(
             'type' => 'Academia\Form\AlunoFieldset'
         ));
        
       $this->add([
           'name' => 'altura',
           'type' => 'text',
           'options' => [
               'label' => 'Altura',
           ]
       ]);
       
        $this->add([
           'name' => 'peso',
           'type' => 'text',
           'options' => [
               'label' => 'Peso',
           ]
       ]);
        
         $this->add([
           'name' => 'bracoD',
           'type' => 'text',
           'options' => [
               'label' => 'Braço Direito',
           ]
       ]);
         
          $this->add([
           'name' => 'bracoE',
           'type' => 'text',
           'options' => [
               'label' => 'Braço Esquerdo',
           ]
       ]);
          
           $this->add([
           'name' => 'antiBracoD',
           'type' => 'text',
           'options' => [
               'label' => 'Anti-Braço Direito',
           ]
       ]);
           
        $this->add([
           'name' => 'antiBracoE',
           'type' => 'text',
           'options' => [
               'label' => 'Anti-Braço Esquerdo',
           ]
       ]);
       
         $this->add([
           'name' => 'coxaD',
           'type' => 'text',
           'options' => [
               'label' => 'Coxa Direita',
           ]
       ]);
         
          $this->add([
           'name' => 'coxaE',
           'type' => 'text',
           'options' => [
               'label' => 'Coxa Esquerda',
           ]
       ]);
          
           $this->add([
           'name' => 'panturrilhaD',
           'type' => 'text',
           'options' => [
               'label' => 'Panturrilha Direita',
           ]
       ]);
           
            $this->add([
           'name' => 'panturrilhaE',
           'type' => 'text',
           'options' => [
               'label' => 'Panturrilha Esquerda',
           ]
       ]);
            
             $this->add([
           'name' => 'peitoralMaior',
           'type' => 'text',
           'options' => [
               'label' => 'Peitoral Maior',
           ]
       ]);
             
        $this->add([
           'name' => 'peitoralMenor',
           'type' => 'text',
           'options' => [
               'label' => 'Peitoral Menor',
           ]
       ]);      
        
         $this->add([
           'name' => 'imc',
           'type' => 'text',
           'options' => [
               'label' => 'IMC',
           ]
       ]);
         
          $this->add([
           'name' => 'massGordura',
           'type' => 'text',
           'options' => [
               'label' => 'Massa Gordura',
           ]
       ]);
          
           $this->add([
           'name' => 'dataIniVig',
           'type' => 'date',
           'options' => [
               'label' => 'Data Inicio Vigente',
           ]
       ]);
           
           $this->add([
           'name' => 'dataFimVig',
           'type' => 'date',
           'options' => [
               'label' => 'Data Fim Vigente',
           ]
       ]);
 
        $this->add([
            'name' => 'pressao',
            'type' => 'text',
            'options' => [
                'label' => 'Pressão',
            ]
        ]);
    
        $this->add([
            'name' => 'batCardiaco',
            'type' => 'text',
            'options' => [
                'label' => 'Batimento Cardiaco',
            ]
        ]);

        $this->add([
            'name' => 'abdomen',
            'type' => 'text',
            'options' => [
                'label' => 'Abdomen',
            ]
        ]);
        
           $this->add([
        'name' => 'costas',
        'type' => 'text',
        'options' => [
            'label' => 'Costas',
        ]
    ]);
    
    $this->add([
        'name' => 'quadril',
        'type' => 'text',
        'options' => [
            'label' => 'Quadril',
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

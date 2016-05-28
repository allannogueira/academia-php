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
        $this->setAttribute('class', 'form-inline');
        $this->add([
            'name' => 'idMedida',
            'type' => 'hidden'
        ]);
        
       
        
       $this->add([
           'name' => 'altura',
           'type' => 'number',
           'options' => [
               'label' => 'Altura (cm)',
           ]
       ]);
       
        $this->add([
           'name' => 'peso',
           'type' => 'number',
           'options' => [
               'label' => 'Peso (kg)',
           ]
       ]);
        
         $this->add([
           'name' => 'bracoD',
           'type' => 'number',
           'options' => [
               'label' => 'Braço Direito (cm)',
           ]
       ]);
         
          $this->add([
           'name' => 'bracoE',
           'type' => 'number',
           'options' => [
               'label' => 'Braço Esquerdo (cm)',
           ]
       ]);
          
           $this->add([
           'name' => 'antiBracoD',
           'type' => 'number',
           'options' => [
               'label' => 'Anti-Braço Direito (cm)',
           ]
       ]);
           
        $this->add([
           'name' => 'antiBracoE',
           'type' => 'number',
           'options' => [
               'label' => 'Anti-Braço Esquerdo (cm)',
           ]
       ]);
       
         $this->add([
           'name' => 'coxaD',
           'type' => 'number',
           'options' => [
               'label' => 'Coxa Direita (cm)',
           ]
       ]);
         
          $this->add([
           'name' => 'coxaE',
           'type' => 'number',
           'options' => [
               'label' => 'Coxa Esquerda (cm)',
           ]
       ]);
          
           $this->add([
           'name' => 'panturrilhaD',
           'type' => 'number',
           'options' => [
               'label' => 'Panturrilha Direita (cm)',
           ]
       ]);
           
            $this->add([
           'name' => 'panturrilhaE',
           'type' => 'number',
           'options' => [
               'label' => 'Panturrilha Esquerda (cm)',
           ]
       ]);
            
             $this->add([
           'name' => 'peitoralMaior',
           'type' => 'number',
           'options' => [
               'label' => 'Peitoral Maior (cm)',
           ]
       ]);
             
        $this->add([
           'name' => 'peitoralMenor',
           'type' => 'number',
           'options' => [
               'label' => 'Peitoral Menor (cm)',
           ]
       ]);      
        
         $this->add([
           'name' => 'imc',
           'type' => 'number',
           'options' => [
               'label' => 'IMC'
           ]
       ]);
         
          $this->add([
           'name' => 'massGordura',
           'type' => 'number',
           'options' => [
               'label' => 'Massa Gordura (kg)',
           ]
       ]);
          
           $this->add([
           'name' => 'dataIniVig',
           'type' => 'date',
           'options' => [
               'label' => 'Data Início Vigente',
           ]
       ]);
        
 
        $this->add([
            'name' => 'pressao',
            'type' => 'number',
            'options' => [
                'label' => 'Pressão (PUL/min)',
            ]
        ]);
    
        $this->add([
            'name' => 'batCardiaco',
            'type' => 'number',
            'options' => [
                'label' => 'Batimento Cardiaco (bpm)',
            ]
        ]);

        $this->add([
            'name' => 'abdomen',
            'type' => 'number',
            'options' => [
                'label' => 'Abdomen (cm)',
            ]
        ]);
        
           $this->add([
        'name' => 'costas',
        'type' => 'number',
        'options' => [
            'label' => 'Costas (cm)',
        ]
    ]);
    
    $this->add([
        'name' => 'quadril',
        'type' => 'number',
        'options' => [
            'label' => 'Quadril (cm)',
        ]
    ]);
        
     $this->add(array(
             'type' => 'Academia\Form\AlunoFieldset'
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

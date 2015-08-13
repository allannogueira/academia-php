<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Academia\Entity\Aluno;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

class MedidaForm extends Form implements ObjectManagerAwareInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
        parent::__construct('medida');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
           //  ->setInputFilter(new AlunoFilter())
         ;
                     
        
        $aluno = new ObjectSelect("aluno");
         $aluno->setLabel("Aluno")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Aluno',
                'property' => 'nome',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("nome" => "ASC"),
                    ]
                )            
        ]);
         
        // echo var_dump($academia);
        $this->add($aluno);
        
       $this->add([
           'name' => 'peso',
           'type' => 'text',
           'options' => [
               'label' => 'Peso',
           ]
       ]);
       
        $this->add([
           'name' => 'altura',
           'type' => 'text',
           'options' => [
               'label' => 'Altura',
           ]
       ]);
        
         $this->add([
           'name' => 'peitoral_maior',
           'type' => 'text',
           'options' => [
               'label' => 'Peitoral Maior',
           ]
       ]);
         
          $this->add([
           'name' => 'peitoral_menor',
           'type' => 'text',
           'options' => [
               'label' => 'Peitoral Menor',
           ]
       ]);
          
           $this->add([
           'name' => 'quadril',
           'type' => 'text',
           'options' => [
               'label' => 'Quadril',
           ]
       ]);
           
        $this->add([
           'name' => 'biceps_esquerdo',
           'type' => 'text',
           'options' => [
               'label' => 'Biceps Esquerdo',
           ]
       ]);
       
         $this->add([
           'name' => 'biceps_direito',
           'type' => 'text',
           'options' => [
               'label' => 'Biceps Direito',
           ]
       ]);
         
          $this->add([
           'name' => 'triceps_esquerdo',
           'type' => 'text',
           'options' => [
               'label' => 'Triceps Esquerdo',
           ]
       ]);
          
           $this->add([
           'name' => 'triceps_direito',
           'type' => 'text',
           'options' => [
               'label' => 'Triceps Direito',
           ]
       ]);
           
            $this->add([
           'name' => 'coxas_esquerda',
           'type' => 'text',
           'options' => [
               'label' => 'Coxas Esquerda',
           ]
       ]);
            
             $this->add([
           'name' => 'coxas_direita',
           'type' => 'text',
           'options' => [
               'label' => 'Coxas Direita',
           ]
       ]);
             
        $this->add([
           'name' => 'panturrilha_esquerda',
           'type' => 'text',
           'options' => [
               'label' => 'Panturrilha Esquerda',
           ]
       ]);      
        
         $this->add([
           'name' => 'panturrilha_direita',
           'type' => 'text',
           'options' => [
               'label' => 'Panturrilha Direita',
           ]
       ]);
         
          $this->add([
           'name' => 'quadril_esquerdo',
           'type' => 'text',
           'options' => [
               'label' => 'Quadril Esquerdo',
           ]
       ]);
          
           $this->add([
           'name' => 'quadril_direito',
           'type' => 'text',
           'options' => [
               'label' => 'Quadril Direito',
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

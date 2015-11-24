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
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

class TreinoForm extends Form implements ObjectManagerAwareInterface
{
    
    public function init()
    {
        
        parent::__construct('academia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        
        
       $this->setHydrator(new DoctrineEntity($this->getObjectManager(), 'Academia\Entity\Treino'));
       /*
        $this->setLabel('Aluno');             
        
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
        
         $treino = new ObjectSelect("treino");
         $treino->setLabel("Treino")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Treino',
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
        $this->add($treino);
        
         */
        $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome do Treino',
           ]
       ]);
       
       $this->add([
           'name' => 'data_inicio',
           'type' => 'date',
           'options' => [
               'label' => 'Data de Inicio',
           ]
       ]);
       
       $this->add([
           'name' => 'data_fim',
           'type' => 'date',
           'options' => [
               'label' => 'Data Final',
           ]
       ]);
       
          $this->add(array(
             'type' => 'Zend\Form\Element\Collection',
             'name' => 'exercicios',
             'options' => array(
                 'label' => 'Escolha exercicios para esse treino',
                 'count' => 2,
                 'allow_add' => true,
                 'target_element' => array(
                     'type' => 'Academia\Form\ExerciciosFieldset',
                 ),
             ),
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

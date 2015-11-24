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

class ExercicioForm extends Form implements ObjectManagerAwareInterface
{
    public function __construct(ObjectManager $objectManager)
    {
         $this->setObjectManager($objectManager);
        parent::__construct('academia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        
        
       $this->setHydrator(new ClassMethodsHydrator(false));
       /*
        
        $aluno = new ObjectSelect("treino");
         $aluno->setLabel("Treino")
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
        ])
                 ->setAttribute("multiple", true);
         
        // echo var_dump($academia);
        $this->add($aluno);
        */
                 
        
       $this->add([
           'name' => 'descricao',
           'type' => 'text',
           'options' => [
               'label' => 'Descrição',
           ]
       ]);
       
       $this->add([
           'name' => 'series',
           'type' => 'text',
           'options' => [
               'label' => 'Series',
           ]
       ]);
       
       $this->add([
           'name' => 'repeticoes',
           'type' => 'text',
           'options' => [
               'label' => 'Repetições',
           ]
       ]);
       
       $this->add([
           'name' => 'intervalo',
           'type' => 'text',
           'options' => [
               'label' => 'Intervalo',
           ]
       ]);
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'arlivre',
            'options' => array(
                'label' => 'Treinar ao ar livre',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'segunda',
            'options' => array(
                'label' => 'segunda',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'terca',
            'options' => array(
                'label' => 'terca',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'quarta',
            'options' => array(
                'label' => 'quarta',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'quinta',
            'options' => array(
                'label' => 'quinta',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'sexta',
            'options' => array(
                'label' => 'sexta',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'sabado',
            'options' => array(
                'label' => 'sabado',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));
       
       $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'domingo',
            'options' => array(
                'label' => 'domingo',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
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

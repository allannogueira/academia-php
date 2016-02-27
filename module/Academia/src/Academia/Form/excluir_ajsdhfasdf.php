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

class DietaForm extends Form implements ObjectManagerAwareInterface
{
    
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name,$options);
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
           //  ->setInputFilter(new AlunoFilter())
         ;
    }
    
    public function init(){
        $aluno = new ObjectSelect("Aluno");
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
        
        $this->setLabel('Cadastrar Dieta');             
        
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       $this->add([
           'name' => 'finalidade',
           'type' => 'textarea',
           'options' => [
               'label' => 'Finalidade',
           ]
       ]);
       
       $this->add([
           'name' => 'dataInicio',
           'type' => 'date',
           'options' => [
               'label' => 'Data de Inicio',
           ]
       ]);
       
       $this->add([
           'name' => 'dataFim',
           'type' => 'date',
           'options' => [
               'label' => 'Data Fim',
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

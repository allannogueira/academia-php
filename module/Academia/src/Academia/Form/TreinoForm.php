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

class TreinoForm extends Form implements ObjectManagerAwareInterface
{
    public function __construct(ObjectManager $objectManager)
    {
         $this->setObjectManager($objectManager);
        parent::__construct('academia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        
        
       $this->setHydrator(new ClassMethodsHydrator(false));
       
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

<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Academia\Form\AlunoFilter;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

class AlunoForm extends Form implements ObjectManagerAwareInterface
{
     protected $objectManager;
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
        parent::__construct('aluno');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
       /* $this
             ->setAttribute('method', 'POST')
            // ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setInputFilter(new AlunoFilter())
         ;*/
        $this
             ->setAttribute('method', 'POST')
         //    ->setHydrator(new ClassMethodsHydrator())
             ->setInputFilter(new AlunoFilter())
         ;
       
        $this->setLabel('Dados Pessoais');             
        
        $academia = new ObjectSelect("academia_id");
         $academia->setLabel("Academia")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Academia',
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
        $this->add($academia);
          
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
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
       
       $this->add([
           'name' => 'email',
           'type' => 'Zend\Form\Element\Email',
           'options' => [
               'label' => 'Email',
           ]
       ]);
       
        $aluno = new ObjectSelect("objetivo");
         $aluno->setLabel("Objetivo")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Objetivo',
                'property' => 'descricao',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("descricao" => "ASC"),
                    ]
                )            
        ]);
         $this->add($aluno);
       
       $this->add([
           'name' => 'usuario',
           'type' => 'text',
           'options' => [
               'label' => 'Usuario',
           ]
       ]);
       
       $this->add([
           'name' => 'senha',
           'type' => 'password',
           'options' => [
               'label' => 'Senha',
           ]
       ]);
       
     /*  $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset',
             'options' => array(
                 'use_as_base_fieldset' => true,
             ),
         ));*/
        $this->add(new EnderecoFieldset($this->getObjectManager()));
       
       
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

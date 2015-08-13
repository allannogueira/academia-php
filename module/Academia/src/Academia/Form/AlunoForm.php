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

class AlunoForm extends Form
{
    public function __construct()
    {
        parent::__construct('aluno');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
             ->setInputFilter(new AlunoFilter())
         ;
        
       
        $this->setLabel('Dados Pessoais');             
        
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
           'type' => 'text',
           'options' => [
               'label' => 'Email',
           ]
       ]);
       
       $this->add([
           'name' => 'objetivo',
           'type' => 'textarea',
           'options' => [
               'label' => 'Objetivo',
           ]
       ]);
       
       $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset',
             'options' => array(
                 'use_as_base_fieldset' => true,
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
    
    
}

<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Academia\Entity\Alimento;

class AlimentoForm extends Form
{
    public function __construct()
    {
        parent::__construct('alimento');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
    }
    
    public function init(){
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
             ->setObject(new Alimento())
         ;
        $this->setAttribute('class', 'form-inline');
        $this->add([
           'name' => 'idAlimento',
           'type' => 'hidden'
       ]);
        
         
         
       $this->add([
           'name' => 'nomeAlimento',
           'type' => 'text',
           'options' => [
               'label' => 'Nome Alimento',
           ]
       ]);
       
       $this->add([
           'name' => 'descricao',
           'type' => 'textarea',
           'options' => [
               'label' => 'Descrição',
           ]
       ]);
       
       $this->add([
           'name' => 'descricao_nutricional',
           'type' => 'textarea',
           'options' => [
               'label' => 'Descrição Nutricional',
           ]
       ]);
       
       $this->add(array(
             'type' => 'Academia\Form\AcademiaFieldset'
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
    
    
}

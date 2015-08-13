<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class AlimentoForm extends Form
{
    public function __construct()
    {
        parent::__construct('alimento');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
           //  ->setInputFilter(new AlunoFilter())
         ;
        
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       $this->add([
           'name' => 'caracteristica',
           'type' => 'textarea',
           'options' => [
               'label' => 'Caracteristicas',
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

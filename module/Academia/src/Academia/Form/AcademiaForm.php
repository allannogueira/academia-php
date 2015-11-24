<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;

class AcademiaForm extends Form
{
    public function __construct()
    {
        parent::__construct('academia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        $this
             ->setAttribute('method', 'POST')
           //  ->setInputFilter(new AlunoFilter())
         ;
        
       
        $this->setLabel('Cadastrar Academia');             
        
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
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

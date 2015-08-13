<?php
namespace Academia\Form;

use Academia\Entity\Endereco;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnderecoFieldset
 *
 * @author Allan
 */
class EnderecoFieldset extends Fieldset implements InputFilterProviderInterface{
    //put your code here
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('endereco');
        $this
             ->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Endereco())
         ;

        $this->setLabel('Endereco');
        
        $this->add(array(
             'type' => 'Academia\Form\CepbrEnderecoCepFieldset',
             'options' => array(
                 'use_as_base_fieldset' => true,
             ),
         ));
        
        $this->add(array(
             'name' => 'rua',
             'options' => array(
                 'label' => 'Rua',
             ),
             'attributes' => array(
                 'required' => 'required',
             ),
         ));
        
        $this->add(array(
             'name' => 'numero',
             'options' => array(
                 'label' => 'Numero',
             ),
             'attributes' => array(
                 'required' => 'required',
             ),
         ));
        
        $this->add(array(
             'name' => 'complemento',
             'options' => array(
                 'label' => 'Complemento',
             ),
             'attributes' => array(
                 'required' => 'required',
             ),
         ));
        
        
    }

    public function getInputFilterSpecification() {
        return array(
             'rua' => array(
                 'required' => true,
             ),
         );
    }

}

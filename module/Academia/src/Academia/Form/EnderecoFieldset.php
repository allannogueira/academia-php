<?php
namespace Academia\Form;

use Academia\Entity\Endereco;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

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
class EnderecoFieldset extends Fieldset{
    //put your code here
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('endereco');
    /*    $this
            // ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Endereco())
         ;*/

        $this->setLabel('Endereco');
        
        $this->add(array(
             'name' => 'cepbr_endereco_cep',
             'options' => array(
                 'label' => 'Cep',
             ),
             'attributes' => array(
                 'required' => 'required',
                 'onBlur' => 'carregaCep()',
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
             )
         ));
        
        
    }
}

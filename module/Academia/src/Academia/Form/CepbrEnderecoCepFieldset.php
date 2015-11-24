<?php
namespace Academia\Form;

use Academia\Entity\CepbrEndereco;
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
class CepbrEnderecoCepFieldset extends Fieldset {
    //put your code here
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('cepbr_endereco_cep');
        $this
        //     ->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new CepbrEndereco())
         ;

        $this->add(array(
             'name' => 'cep',
             'options' => array(
                 'label' => 'Cep',
             ),
             'attributes' => array(
                 'required' => 'required',
                 'onBlur' => 'carregaCep()',
             ),
         ));
        
    }


}

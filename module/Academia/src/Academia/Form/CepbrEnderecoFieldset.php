<?php
namespace Academia\Form;

use Academia\Entity\CepbrEndereco;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Validator\NoObjectExists;
 use Zend\InputFilter\InputFilter;
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
class CepbrEnderecoFieldset extends Fieldset implements ObjectManagerAwareInterface, \Zend\InputFilter\InputFilterProviderInterface{
    //put your code here
    private $objectManager;
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('cepbrEnderecoCep');
        
    }
    
    public function init(){
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
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
        
        $this->add(array(
             'type' => 'Academia\Form\CepbrCidadeFieldset'
         ));
        /*
        $cep = $this->getInputFilter()->get('cep');  
       $cepFilter = new NoObjectExists(array(
            'object_repository' => $this->getObjectManager()->getRepository('Academia\Entity\CepbrEndereco'),
            'fields' => array(
                'cep'
            )
        ));
        
       $cep->getValidatorChain()
                 ->attach($cepFilter);//pega classe que foi criada manualmente*/
 //echo var_dump($cep);
   
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

    public function getInputFilterSpecification() {
        return array(
            'cep' => array(
            'validators' => array(
                array(
                    'name' => 'DoctrineModule\Validator\ObjectExists',
                    'options' => array(
                        'use_context'       => true,
                        'object_repository' => $this->getObjectManager()->getRepository('Academia\Entity\CepbrEndereco'),
                        'object_manager' => $this->getObjectManager(),
                        'fields' => 'cep',
                        'messages' => array(
                            'noObjectFound' => 'Desculpe, este cep não existe!'
                        ),
                    ),
                )
            ),
        )
        );
    
    }

}

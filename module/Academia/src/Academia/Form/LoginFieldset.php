<?php
namespace Academia\Form;

use Academia\Entity\Login;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\InputFilter\InputFilterProviderInterface;
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
class LoginFieldset extends Fieldset  implements ObjectManagerAwareInterface,InputFilterProviderInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idLogin');
        
    }
    
    public function init(){
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Login())
        ;
        $this->setLabel('Login');
        $this->add([
           'name' => 'idLogin',
           'type' => 'hidden'
        ]);
        
        $this->add([
           'name' => 'email',
           'type' => 'Zend\Form\Element\Email',
           'options' => [
               'label' => 'Email',
           ],
            'attributes' => array(
                'required'  => 'required'
            )
       ]);
        
        $this->add([
           'name' => 'senha',
           'type' => 'Zend\Form\Element\Password',
           'options' => [
               'label' => 'Senha'
           ]
       ]);
        
        
    }

    public function getInputFilterSpecification()
    {
        return array(
            'email' => array(
                'validators' => array(
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'use_context'       => true,
                            'object_manager' => $this->getObjectManager(),
                            'object_repository' => $this->getObjectManager()->getRepository('Academia\Entity\Login'),
                            'fields' => 'email',
                            'messages' => array(
                                'objectNotUnique' => 'este email já existe!',
                            )
                            
                        )
                    )
                )
            )
        );
    }
    
    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

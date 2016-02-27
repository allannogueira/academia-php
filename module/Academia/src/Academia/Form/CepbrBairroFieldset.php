<?php
namespace Academia\Form;

use Academia\Entity\CepbrBairro;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
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
class CepbrBairroFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idBairro');
        $this
             ->setHydrator(new ClassMethodsHydrator(true))
             ->setObject(new CepbrBairro())
         ;
    }
    
    public function init(){
        $bairro = new ObjectSelect("idBairro");
         $bairro->setLabel("Bairro")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\CepbrBairro',
                'property' => 'bairro',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("bairro" => "ASC"),
                    ]
                )            
        ]);
        // echo var_dump($academia);
        $this->add($bairro);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

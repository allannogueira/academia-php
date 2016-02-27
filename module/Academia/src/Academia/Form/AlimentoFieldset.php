<?php
namespace Academia\Form;

use Academia\Entity\Alimento;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Form\Element\ObjectSelect;
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
class AlimentoFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idAlimento');
        
    }
    
    public function init(){
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Alimento())
        ;
        
        $select = new ObjectSelect("idAlimento");
         $select->setLabel("Alimento")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Alimento',
                'property' => 'nomeAlimento',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("nomeAlimento" => "ASC"),
                    ]
                )            
        ]);
         
        // echo var_dump($academia);
        $this->add($select);
        
        
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

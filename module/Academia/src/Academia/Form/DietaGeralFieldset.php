<?php
namespace Academia\Form;

use Academia\Entity\DietaGeral;
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
class DietaGeralFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idDietaGeral');
        
    }
    
    public function init(){
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new DietaGeral())
        ;
        
        $select = new ObjectSelect("idDietaGeral");
         $select->setLabel("Dieta Geral")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\DietaGeral',
                'property' => 'nomeDieta',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("nomeDieta" => "ASC"),
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

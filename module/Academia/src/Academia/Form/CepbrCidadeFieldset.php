<?php
namespace Academia\Form;

use Academia\Entity\CepbrCidade;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
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
class CepbrCidadeFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idCidade');
       
    }
    
    public function init(){
         $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new CepbrCidade())
         ;
         
        $this->add(array(
             'type' => 'Academia\Form\CepbrEstadoFieldset'
         ));
        
        //echo var_dump($this->get("uf"));
        $cidade = new ObjectSelect("idCidade");
        $cidade->setLabel("Cidade")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\CepbrCidade',
                'property' => 'cidade',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array('uf' => 'SP'),
                        'orderBy'   => array("cidade" => "ASC"),
                    ]
                )            
        ]);
        // echo var_dump($academia);
        $this->add($cidade);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

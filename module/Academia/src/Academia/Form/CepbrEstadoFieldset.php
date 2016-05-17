<?php
namespace Academia\Form;

use Academia\Entity\CepbrEstado;
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
class CepbrEstadoFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
     public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('uf');
        $this
             ->setHydrator(new ClassMethodsHydrator(true))
             ->setObject(new CepbrEstado())
         ;
    }
    
    public function init(){
        $estado = new ObjectSelect("uf");
         $estado->setLabel("Estado")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\CepbrEstado',
                'property' => 'estado',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("estado" => "ASC"),
                    ]
                )  
              
        ])->setAttributes([
                   
                 'required' => 'required',
                 'onBlur' => 'carregaCidade()',
        ]);
        // echo var_dump($academia);
        $this->add($estado);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

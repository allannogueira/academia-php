<?php
namespace Academia\Form;

use Academia\Entity\Academia;
use Zend\Form\Fieldset;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
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
class AcademiaFieldset extends Fieldset  implements ObjectManagerAwareInterface{
    //put your code here
    private $objectManager;
    public function __construct()
    {
        // Add any elements that need to fetch data from database
        // using the album table !
        parent::__construct('idAcademia');
        
    }
    
    public function init(){
        
        $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Academia())
         ;
        
        $session = new \Zend\Session\Container();
        if($session['idAcademia'] != ""){
            $condicao = array("idAcademia" => "".$session['idAcademia']."");
        }else{
            $condicao = array();
        }
        
        $this->setLabel('Academia');
        $academia = new ObjectSelect("idAcademia");
        $academia->setLabel("")
                 ->setOptions([ 
                    'object_manager'     => $this->getObjectManager(),
                    'target_class'       => 'Academia\Entity\Academia',
                    'property' => 'nome',
                    'is_method' => true,
                    'required' => true,
                    'find_method'        => array(
                        'name'  => 'findBy',
                        'params' =>[
                            'criteria'   => $condicao,
                            'orderBy'   => array("nome" => "ASC"),
                        ]
                    )            
                ])
                ->setAttributes([
                 'required' => 'true'
                ]);
        $this->add($academia);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

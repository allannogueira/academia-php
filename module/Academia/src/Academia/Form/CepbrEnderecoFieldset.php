<?php
namespace Academia\Form;

use Academia\Entity\CepbrEndereco;
use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
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
class CepbrEnderecoFieldset extends Fieldset implements ObjectManagerAwareInterface{
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
        
       /* $this->add(array(
             'name' => 'endereco',
             'options' => array(
                 'label' => 'Logradouro',
             ),
             'attributes' => array(
                 'required' => 'required',
               //  'onBlur' => 'carregaCep()',
             ),
         ));*/
        
        
        $this->add(array(
             'type' => 'Academia\Form\CepbrCidadeFieldset'
         ));
        
    /*    $this->add(array(
             'type' => 'Academia\Form\CepbrBairroFieldset',
             'name' => 'idBairro'
         ));*/
        
        /*
        
        $cidade = new ObjectSelect("id_cidade");
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
                        'criteria'   => array(),
                        'orderBy'   => array("cidade" => "ASC"),
                    ]
                )            
        ]);
        // echo var_dump($academia);
        $this->add($cidade);
        
         $bairro = new ObjectSelect("id_bairro");
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
        ]);*/
        // echo var_dump($academia);
       // $this->add($bairro);
        //$this->add(new ($this->getObjectManager()));
        //$this->add(new CepbrEstadoFieldset($this->getObjectManager()));
       // $this->add(new CepbrCidadeFieldset($this->getObjectManager()));
   
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

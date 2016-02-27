<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Academia\Entity\Academia;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class AcademiaForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
    public function __construct($name = null, $options = array())
    {        
        parent::__construct($name,$options);
        
    }
    
    public function init(){
          $this
             ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
             ->setObject(new Academia())                
             ->setInputFilter(new AcademiaFilter())
         ;
        
        $this->add([
           'name' => 'idAcademia',
           'type' => 'hidden',           
       ]);
          
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       $this->add([
           'name' => 'dataCadastro',
           'type' => 'date',
           'options' => [
               'label' => 'Data de Cadastro',
           ]
       ]);
       
       $this->add([
           'name' => 'telefoneComercial1',
           'type' => 'text',
           'options' => [
               'label' => 'Telefone Comercial',
           ]
       ]);
       
       $this->add([
           'name' => 'telefoneComercial2',
           'type' => 'text',
           'options' => [
               'label' => 'Telefone Comercial 2',
           ]
       ]);
       
        $matriz = new ObjectSelect("idMatriz");
        $matriz->setLabel("Matriz")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Academia',
                'property' => 'nome',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("nome" => "ASC"),
                    ]
                )            
        ]);
        $this->add($matriz);
       
        
       $this->add(array(
             'type' => 'Academia\Form\EnderecoFieldset'
         ));
       
   
       $this->add(array(
             'type' => 'Zend\Form\Element\Csrf',
             'name' => 'csrf',
         ));
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'options' => [
               'label' => 'Salvar',
           ]
       ]);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}

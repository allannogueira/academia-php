<?php
namespace Academia\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use Academia\Entity\Academia;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;


class ProfissionalForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
        parent::__construct('academia');
     /*   $this->setAttribute('method','POST');
        $this->setInputFilter(new AlunoFilter());                
        */
        $this
             ->setAttribute('method', 'POST')
             ->setHydrator(new ClassMethodsHydrator())
           //  ->setInputFilter(new AlunoFilter())
         ;
        
       
        $this->setLabel('Cadastrar Academia');             
        
        $academia = new ObjectSelect("academia");
         $academia->setLabel("Academia")
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
         
        // echo var_dump($academia);
        $this->add($academia);
         
       $this->add([
           'name' => 'nome',
           'type' => 'text',
           'options' => [
               'label' => 'Nome',
           ]
       ]);
       
       $this->add([
           'name' => 'senha',
           'type' => 'password',
           'options' => [
               'label' => 'Senha',
           ]
       ]);
     
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

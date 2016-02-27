<?php

namespace Academia\Form;

 use Academia\Entity\Aluno;
 use Zend\Form\Fieldset;
 use Zend\InputFilter\InputFilterProviderInterface;
 use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class AlunoFieldset  extends Fieldset implements InputFilterProviderInterface
{
    
    function __construct(){
        parent::__construct('aluno');
        $this
             ->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \Academia\Entity\Aluno())
         ;
         
       
    }
    
     /**
      * @return array
      */
     public function getInputFilterSpecification()
     {
         return array(
             'name' => array(
                 'required' => true,
             ),
         );
     }
}
<?php 

namespace Academia\Form;

 use Academia\Entity\Exercicios;
 use Zend\Form\Fieldset;
 use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

 class ExerciciosFieldset extends Fieldset implements ObjectManagerAwareInterface
 {
     public function init()
     {
         
         parent::__construct('exercicios');

         $this
             ->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new Exercicios())
         ;

         $exercicios = new ObjectSelect("exercicios");
         $exercicios->setLabel("Exercicio")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Exercicios',
                'property' => 'descricao',
               'empty_option' => 'selecione',
                'is_method' => true,
                'find_method'        => array(
                    'name'  => 'findBy',
                    'params' =>[
                        'criteria'   => array(),
                        'orderBy'   => array("descricao" => "ASC"),
                    ]
                )            
        ]);
        $this->add($exercicios);
     }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}
 
 ?>
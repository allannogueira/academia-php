<?php 

namespace Academia\Form;

 use Academia\Entity\Exercicio;
 use Zend\Form\Fieldset;
 use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

 class ExerciciosFieldset extends Fieldset implements ObjectManagerAwareInterface
 {
     private $objectManager;
    public function __construct($name = null, $options = array())
    {
        parent::__construct("idExercicio",$options);
    }
    
    public function init(){
        $this
            ->setHydrator(new DoctrineHydrator($this->getObjectManager()))
            ->setObject(new Exercicio())
        ;
        

         $exercicios = new ObjectSelect("idExercicio");
         $exercicios->setLabel("Exercicio")
                 ->setOptions([ 
                'object_manager'     => $this->getObjectManager(),
                'target_class'       => 'Academia\Entity\Exercicio',
                'property' => 'nomeExercicio',
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
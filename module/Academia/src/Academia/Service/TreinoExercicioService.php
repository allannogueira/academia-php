<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Description of AlunoService
 *
 * @author Allan
 */
class TreinoExercicioService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\TreinoExercicio';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }

    
    public function save(Array $data = array())
    {
        echo "<pre>";
      //  echo print_r($this->hydrate($data,new \Academia\Entity\Treino()));
         echo var_dump($data);
        echo "</pre>";
        
        return parent::save($data);
        //$this->addTreino($entity,$data);
        //return $entity;
    }
    
    
   /* public function addTreino(\Academia\Entity\Exercicios $entityExercicios, Array $data){
        $jaExiste = false;
        if(isset($data['treino'])){
            $i = 0;
            foreach($data['treino'] as $idTreino){
                
                //$entityTreino = $this->getEm()->getReference("\Academia\Entity\Treino",$idTreino);
                
                //se nao existir o treino eu adiciono
                $query = "select t from \Academia\Entity\Treino t where t.id=$idTreino";
                foreach($this->getEm()->createQuery($query)->getResult() as $treino){
                    
                        foreach($treino->getExercicios() as $exercicios){
                            if($exercicios->getId() == 11){
                                $jaExiste == true;
                            }
                        }
                }
             //   echo var_dump($result);
                if(!$jaExiste){
                    $entityExercicios->addTreino($entityTreino);
                }
            }
        }
        $this->em->persist($entityExercicios);
        $this->em->flush();
    }*/
}

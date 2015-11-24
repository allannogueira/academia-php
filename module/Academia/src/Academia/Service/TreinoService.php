<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Treino;
use Zend\StdLib\Hydrator\ClassMethods;

/**
 * Description of AlunoService
 *
 * @author Allan
 */
class TreinoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Treino';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
         //trata as datas
         $hydrator = new ClassMethods();
         $entity = new \Academia\Entity\Exercicios();
         //$data['exercicios'] = $hydrator->hydrate($data['exercicios'][0], $entity);
         //echo "<pre>".print_r($data['exercicios'])."</pre>";exit;
        
        //echo "<pre>".print_r($entityTreino)."</pre>";exit;
        $data['data_inicio'] = new \DateTime($data['data_inicio']);
        $data['data_fim'] = new \DateTime($data['data_fim']);
        $entityTreino = parent::save($data);
        return $this->addExercicios($entityTreino,$data);
        
        
    }
    
    public function addExercicios($entityTreino,$data){
        //transforma em entidades de exercicios e adiciona ao treino
        //passa por cada id, e busca sua referencia na classe retornando uma entidade de Exercicios
        foreach($data['exercicios'] as $idExercicio){
            //$entityExercicio = $this->getEm()->getReference("\Academia\Entity\Exercicios",$idExercicio['exercicios']);
            $entityExercicio = $this->getEm()->getRepository("\Academia\Entity\Exercicios")->findBy(array('id' => $idExercicio['exercicios']));
            $entityExercicio = array_pop($entityExercicio); 
          //  echo var_dump($entityExercicio);exit;
            $entityTreino->getExercicios()->add($entityExercicio);
        }
        
        //salva no banco
        $this->em->persist($entityTreino);
        $this->em->flush();
        return $entityTreino;
    }
}

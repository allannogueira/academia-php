<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Description of AlunoService
 *
 * @author Allan
 */
class AlunoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Aluno';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
    public function save(Array $data = array()){
       
        $objetoAluno = parent::preSave($data);
        
        $objetoAluno->getIdLogin()->setIdAluno($objetoAluno);
        
        parent::getEm()->persist($objetoAluno);
       parent::getEm()->flush();
       
       return $objetoAluno;
    }
    
    
}

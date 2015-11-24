<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Frequencia;


/**
 * Description of AlunoService
 *
 * @author Allan
 */
class FrequenciaService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Frequencia';
        parent::__construct($em);
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
    public function save(Array $data = array()){
        //echo $data['id'] = 1;
          $data['aluno'] = $this->em->getRepository('Academia\Entity\Aluno')
                                ->find($data['aluno']);
        //  echo var_dump($data['dataPresenca']);
          
          $data['dataPresenca'] = new \DateTime($data['dataPresenca']);
         //print_r($entityAluno);
         //$objInformativo->setAluno($entityAluno);
              
       //  print_r($data['aluno']);
         //exit;
        return parent::save($data);
    }
}


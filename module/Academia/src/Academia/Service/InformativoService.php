<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Treino;


/**
 * Description of AlunoService
 *
 * @author Allan
 */
class InformativoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Informativo';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
         $entityAluno = $this->em->getRepository('Academia\Entity\Aluno')
                                ->find($data['aluno']);
         
        // $objInformativo->setAluno($aluno);
         $data['aluno'] = $entityAluno;       
        /*echo "<pre>";
        print_r($objInformativo);
        echo "</pre>";*/
        
        return parent::save($data);
    }
}

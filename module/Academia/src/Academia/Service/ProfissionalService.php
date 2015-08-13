<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Treino;


/**
 * Description of CadastrarProfissionalService
 *
 * @author Allan
 */
class ProfissionalService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Profissional';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
        return parent::save($data);
    }
}

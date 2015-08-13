<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Aparelho;


/**
 * Description of CadastrarProfissionalService
 *
 * @author Allan
 */
class AparelhoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Aparelho';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
        return parent::save($data);
    }
}

<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\TreinoGeral;
use Zend\StdLib\Hydrator\ClassMethods;

/**
 * Description of TreinoGeralService
 *
 * @author Allan
 */
class TreinoGeralService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\TreinoGeral';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
    public function save(Array $data = array()){
         return parent::save($data);
    }
}

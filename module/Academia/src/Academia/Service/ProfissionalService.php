<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Treino;
use Academia\Entity\Endereco;


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
        $data['senha'] = md5($data['senha']);
        $entityEndereco = new Endereco($data['endereco']);
        $data['endereco'] = $entityEndereco;
        
        return parent::save($data);
   //     $data['endereco'] = $this->em->getRepository('Academia\Entity\Endereco')
     //                           ->find($data['']);
        
    }
}

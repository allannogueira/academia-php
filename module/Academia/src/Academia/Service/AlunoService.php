<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Endereco;
use Academia\Entity\CepbrEndereco;
use Zend\Session\Container;

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
        //resgata id da academia
        $sessao = new Container();
        $id = $sessao->authenticate->getIdentity()->getId();
       // echo var_dump($data['senha']);exit;
        $data['senha'] = md5($data['senha']);
        
        
        //se nao for administrador, pega a respectiva academia 
        if($data['academia_id'] == ""){
            $data['academia_id'] = $id;
        }
        $entityEndereco = new Endereco($data['endereco']);
        $data['endereco'] = $entityEndereco;
        return parent::save($data);
    }
    
    
   /* public function save(array $data = array()) {
        $data['endereco'] = new Endereco();
        echo $data['endereco'];exit;
        parent::save($data);
    }*/
}

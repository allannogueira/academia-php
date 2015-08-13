<?php

namespace Academia\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Academia\Entity\Endereco;
use Academia\Entity\CepbrEndereco;


/**
 * Description of AlunoService
 *
 * @author Allan
 */
class CepbrEnderecoService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\CepbrEndereco';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
   /*  public function save(Array $data = array()){
        //echo var_dump($data);exit;
        $entityEndereco = new Endereco();
        $entityEndereco->setRua($data['endereco']['rua']);
        $entityEndereco->setNumero($data['endereco']['numero']);
        $entityEndereco->setComplemento($data['endereco']['complemento']);
       // echo var_dump($entityEndereco);exit;
        
        $entityCepbrEndereco = new CepbrEndereco();
      //  echo var_dump($this->em->getRepository('Academia\Entity\CepbrEndereco')->find($data['endereco']['cepbr_endereco_cep']['cep']));exit;
        $entityEndereco->setCepbrEndereco($this->em->getRepository('Academia\Entity\CepbrEndereco')
                                                        ->find($data['endereco']['cepbr_endereco_cep']['cep']));
       
         $entityCepbrEndereco = new CepbrEndereco();
      //  echo var_dump($this->em->getRepository('Academia\Entity\CepbrEndereco')->find($data['endereco']['cepbr_endereco_cep']['cep']));exit;
        $entityEndereco->setCepbrEndereco($this->em->getRepository('Academia\Entity\CepbrEndereco')
                                                        ->find($data['endereco']['cepbr_endereco_cep']['cep']));
       
        $data['endereco'] = $entityEndereco;
        return parent::save($data);
   //     $data['endereco'] = $this->em->getRepository('Academia\Entity\Endereco')
     //                           ->find($data['']);
        
    }*/
}

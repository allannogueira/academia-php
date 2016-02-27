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
class AcademiaService extends AbstractService{
    public function __construct(EntityManager $em){
        $this->entity = 'Academia\Entity\Academia';
        parent::__construct($em);
        
       // $request = $this->getRequest();
        //echo var_dump($request->getPost());
    }
    
     public function save(Array $data = array()){
        
       /* $uf = $data["idEndereco"]["cepbrEnderecoCep"]["idCidade"]["uf"];
        $cidade = $data["idEndereco"]["cepbrEnderecoCep"]["idCidade"];
        $bairro = $data["idEndereco"]["cepbrEnderecoCep"]["idBairro"];
        $academia = $data["idAcademia"];
        $cep = $data["idEndereco"]["cepbrEnderecoCep"];
        $rua = $data['idEndereco']['rua'];
        $numero = $data['idEndereco']['numero'];
        $complemento = $data['idEndereco']['complemento'];
        
        $data["idEndereco"]["idTipoEndereco"] = 1; /*HARDDDD CODE*/
      /*  $tipoEndereco = $data["idEndereco"]["idTipoEndereco"];
        
        $data["idFinalidade"] = 1; /*HARDDDD CODE*/
      /*  $finalidade = $data["idFinalidade"];
        //Hydration
        $data["idEndereco"]["cepbrEnderecoCep"]["idCidade"]["uf"] = $this->getEm()->getRepository("Academia\Entity\CepbrEstado")->find($uf);;
        $data["idEndereco"]["cepbrEnderecoCep"]["idCidade"] = $this->getEm()->getRepository("Academia\Entity\CepbrCidade")->find($cidade);
        $data["idEndereco"]["cepbrEnderecoCep"]["idBairro"] = $this->getEm()->getRepository("Academia\Entity\CepbrBairro")->find($bairro);
        $data["idEndereco"]["cepbrEnderecoCep"] = $this->getEm()->getRepository("Academia\Entity\CepbrEndereco")->find($cep);
        $data["idEndereco"]["idTipoEndereco"] = $this->getEm()->getRepository("Academia\Entity\TipoEndereco")->find(1);
        $data["idAcademia"] = $this->getEm()->getRepository("Academia\Entity\Academia")->find($academia);
        $data["idEndereco"]["idTipoEndereco"] = $this->getEm()->getRepository("Academia\Entity\TipoEndereco")->find($tipoEndereco); 
        $data["idFinalidade"] = $this->getEm()->getRepository("Academia\Entity\Finalidade")->find($finalidade); 
        
        $objLogin = new \Academia\Entity\Login(); 
        $objLogin->setEmail($data["idLogin"]["email"]);
        $objLogin->setSenha($data["idLogin"]["senha"]);
        
        $objEndereco = new \Academia\Entity\Endereco();
        $objEndereco->setRua($rua);
        $objEndereco->setNumero($numero);
        $objEndereco->setComplemento($complemento);
        $objEndereco->setCepbrEnderecoCep($data["idEndereco"]["cepbrEnderecoCep"]);
        $objEndereco->setIdTipoEndereco($data["idEndereco"]["idTipoEndereco"]);       
        
        $this->getEm()->persist($objLogin);
                                
        $data["idEndereco"] = $objEndereco;
        $data["idLogin"] = $objLogin;
        */
        //echo var_dump( $data);  
         //$this->getEm()->persist($data["idEndereco"]);
        return parent::save($data);
    }
}

<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Academia\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class CepbrEnderecoController extends AbstractController
{
    public function __construct()
    {
         // $this->form = 'Academia\Form\AlunoForm';
        $this->controller = 'CepbrEnderecoController';
       // $this->route = 'cadastrarAluno';
        $this->service = 'Academia\Service\CepbrEnderecoService';
        $this->entity = 'Academia\Entity\CepbrEndereco';
        $this->listarAction = "cepbrEnderecosAction";//nome da chamada no webservice
    }
	
    public function getCepAction(){
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c','b','cid','uf')
             ->from('Academia\Entity\CepbrEndereco', 'c') 
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
                ->leftJoin('c.idBairro','b')
                ->leftJoin('c.idCidade','cid')
                ->leftJoin('cid.uf','uf')
                 ->where("c.cep='".$_REQUEST['cep']."'");
        $query = $qb->getQuery()->getArrayResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
       // $query = $this->getEm()->createQuery("SELECT c FROM Academia\Entity\CepbrEndereco c where c.cep='".$_REQUEST['cep']."'");
        
        
       // $query = $query->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
      //  echo var_dump($query);exit;
        //  echo var_dump($query[0]);exit;
        return new JsonModel(array("data" => $query));
    }
    
     public function getCidadesAction(){
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('c')
             ->from('Academia\Entity\CepbrCidade', 'c') 
                 ->where("c.uf='".$_REQUEST['uf']."'");
        $query = $qb->getQuery()->getArrayResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
       // $query = $this->getEm()->createQuery("SELECT c FROM Academia\Entity\CepbrEndereco c where c.cep='".$_REQUEST['cep']."'");
        
       // $query = $query->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
      //  echo var_dump($query);exit;
        //  echo var_dump($query[0]);exit;
        return new JsonModel(array("data" => $query));
    }
}

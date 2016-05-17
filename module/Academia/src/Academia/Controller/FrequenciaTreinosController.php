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
use WS\Controller\ClienteController;

class FrequenciaTreinosController extends AbstractController
{
    public function __construct()
    {
        $this->controller = 'AcademiaController';
        $this->route = 'academia';
        $this->service = 'Academia\Service\AcademiaService';
        $this->entity = 'Academia\Entity\FrequenciaAluno';
    }
    
    public function editarAction(){
      /*  $id = $this->params()->fromRoute('id',0);
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('a','e','t','c','b','d','uf')
             ->from('Academia\Entity\Academia', 'a')
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
                ->leftJoin('a.idEndereco','e')
                 ->leftJoin('e.idTipoEndereco','t')
                 ->leftJoin('e.cepbrEnderecoCep','c')
                ->leftJoin('c.idBairro','b')
                ->leftJoin('c.idCidade','d')
                ->leftJoin('d.uf','uf')
                 ->where('a.idAcademia = '.$id);
        $this->resultData = $qb->getQuery()->getResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);*/
             //   echo var_dump($this->resultData);
        return parent::editarAction();
    }
    
    public function listarAction($where = ""){
     
        return parent::listarAction($where);
    }
    
       public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idAcademia'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
  
}

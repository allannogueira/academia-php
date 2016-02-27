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
use Zend\View\Model\ViewModel;

class AlunoController extends AbstractController
{
    
    public function __construct(){        
        
        $this->form = 'Academia\Form\AlunoForm';
        $this->controller = 'AlunoController';
        $this->route = 'aluno';
        $this->service = 'Academia\Service\AlunoService';
        $this->entity = 'Academia\Entity\Aluno';
        $this->listarAction = "alunosAction";//nome da chamada no webservice
    }
    
    
    /*public function selecionarAction() {
        $viewModel = $this->listarAction();
        $viewModel = $viewModel->setTerminal(true);
        return $viewModel;
    }*/
    
    public function editarAction(){
     
      /*  $qb = $this->getEm()->createQueryBuilder();
        $qb->select('a','e','t','c','b','d','uf','i','g','h')
             ->from('Academia\Entity\Aluno', 'a') 
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
                ->leftJoin('a.idEndereco','e')
                 ->leftJoin('e.idTipoEndereco','t')
                 ->leftJoin('e.cepbrEnderecoCep','c')
                ->leftJoin('c.idBairro','b')
                ->leftJoin('c.idCidade','d')
                ->leftJoin('d.uf','uf')
                ->leftJoin('a.idLogin','i')
                ->leftJoin('a.idAcademia','g')
                ->leftJoin('a.idFinalidade','h')
                 ->where('a.idAluno = 1');
        $this->resultData = $qb->getQuery()->getArrayResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);*/
       //   echo var_dump($this->resultData);      
        return parent::editarAction();
    }
    
    public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
        $cpf = $this->params()->fromPost("cpf");
                
        $where = "where (t.nomeAluno like '%".$nome."%' or '".$nome."' = '') and (t.cpf='".$cpf."' or '".$cpf."' = '')";
        
        
        return parent::listarAction($where);
        
    }
    
    /*
     * Exclui um registro
     */
    public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idAluno'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
    
   
}

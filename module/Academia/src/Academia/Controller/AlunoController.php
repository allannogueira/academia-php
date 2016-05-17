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
use ZfcUser\View\Helper\ZfcUserIdentity;

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
    
 

    
    public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
        $cpf = $this->params()->fromPost("cpf");
                
        $where = "where (t.nomeAluno like '%".$nome."%' or '".$nome."' = '') and (t.cpfAluno='".$cpf."' or '".$cpf."' = '')";
        
        
        return parent::listarAction($where);
        
    }
    
     public function getPerfilAction($where = ""){
        $id = $this->params()->fromRoute('id');
        $where = "where (t.idAluno = '".$id."')";
        
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

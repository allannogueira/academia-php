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

class DietaAlunoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\DietaAlunoForm';
        $this->controller = 'DietaAlunoController';
        $this->route = 'dietaAluno';
        $this->service = 'Academia\Service\DietaAlunoService';
        $this->entity = 'Academia\Entity\DietaAluno';
    }
 
    public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idDietaAluno'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
}

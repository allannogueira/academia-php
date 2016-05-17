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

class MusculoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\MusculoForm';
        $this->controller = 'MusculoController';
        $this->route = 'musculo';
        $this->service = 'Academia\Service\MusculoService';
        $this->entity = 'Academia\Entity\Musculo';
    }
    
     public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
                
        $where = "where (t.nomeMusculo like '%".$nome."%' or '".$nome."' = '') ";
             
        return parent::listarAction($where);
    }
    
    public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idMusculo'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
}

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

class ProfissionalController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\ProfissionalForm';
        $this->controller = 'ProfissionalController';
        $this->route = 'profissional';
        $this->service = 'Academia\Service\ProfissionalService';
        $this->entity = 'Academia\Entity\Profissional';
        $this->listarAction = "profissionaisAction";//nome da chamada no webservice
    }

	
    public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
      
        $where = "where (t.nome like '%".$nome."%' or '".$nome."' = '')";
        return parent::listarAction($where);
    }
    
     public function getPerfilAction($where = ""){
        $id = $this->params()->fromRoute("id");
      
        $where = "where (t.id = '".$id."')";
        return parent::listarAction($where);
    }
    
    public function editarAction(){
        return parent::editarAction();
        
    }
}

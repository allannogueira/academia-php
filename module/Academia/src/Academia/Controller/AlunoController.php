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
        $this->route = 'cadastrarAluno';
        $this->service = 'Academia\Service\AlunoService';
        $this->entity = 'Academia\Entity\Aluno';
    }
    
    /*
    public function inserirAction() {
       $this->form = $this->getServiceLocator()->get($this->form);
       return parent::inserirAction();
    }*/
    
    
    public function selecionarAction() {
        $viewModel = $this->listarAction();
        $viewModel = $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    
}

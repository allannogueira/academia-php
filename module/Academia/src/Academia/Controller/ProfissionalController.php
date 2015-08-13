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
        $this->route = 'cadastrarProfissional';
        $this->service = 'Academia\Service\ProfissionalService';
        $this->entity = 'Academia\Entity\Profissional';
    }
    
    public function inserirAction(){
        
        $this->form = $this->getServiceLocator()->get($this->form);
        
        return parent::inserirAction();
    }
	
}

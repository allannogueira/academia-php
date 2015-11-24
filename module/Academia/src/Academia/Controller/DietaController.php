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

class DietaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\DietaForm';
        $this->controller = 'DietaController';
        $this->route = 'dieta';
        $this->service = 'Academia\Service\DietaService';
        $this->entity = 'Academia\Entity\Dieta';
        $this->listarAction = "dietasAction";//nome da chamada no webservice
    }
    
    public function inserirAction(){
        
        $this->form = $this->getServiceLocator()->get($this->form);        
        return parent::inserirAction();
    }
	
}

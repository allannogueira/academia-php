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

class TreinoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\TreinoForm';
        $this->controller = 'TreinoController';
        $this->route = 'cadastrarTreino';
        $this->service = 'Academia\Service\TreinoService';
        $this->entity = 'Academia\Entity\Treino';
    }
    /*
    public function inserirAction(){
        echo "<pre>";
        var_dump($this);
        echo "</pre>";
        exit;
    }*/
    
     public function inserirAction(){
        
        $this->form = $this->getServiceLocator()->get($this->form);        
        return parent::inserirAction();
    }
	
}

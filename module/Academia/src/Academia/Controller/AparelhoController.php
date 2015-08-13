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

class AparelhoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\AparelhoForm';
        $this->controller = 'AparelhoController';
        $this->route = 'cadastrarAparelho';
        $this->service = 'Academia\Service\AparelhoService';
        $this->entity = 'Academia\Entity\Aparelho';
    }
	
    public function inserirAction(){
        
        $this->form = $this->getServiceLocator()->get($this->form);        
        return parent::inserirAction();
    }
}

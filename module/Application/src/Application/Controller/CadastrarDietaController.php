<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\CadastrarDieta;  

class CadastrarDietaController extends AbstractActionController
{
    public function cadastrarDietaAction()
    {
         $form = new CadastrarDieta();
		 return array('form' => $form);
    }
	
	public function addAction(){
		$request = $this->getRequest();
		$view = new ViewModel(array(
			"posts"=> $request->getPost(),
		));
		return $view;
	}
}

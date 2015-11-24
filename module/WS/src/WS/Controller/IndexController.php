<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace WS\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;
class IndexController extends AbstractActionController
{
	private $_WSDL_URI = "http://localhost/services";
    
    public function indexAction()
    {
    	if (isset($_GET['wsdl'])) {
            
    		$this->handleWSDL();
    	} else {
    		$this->handleSOAP();
    	}
    	
    	$view = new ViewModel();
    	$view->setTerminal(true);
    	exit;
    }
    
    public function produtosAction() {
        
    	if (isset($_GET['wsdl'])) {
    		$this->handleWSDL('/index/produtos', '\WS\Service\Produto');
    	} else {
    		$this->handleSOAP('/index/produtos?wsdl', '\WS\Service\Produto');
    	}
    	 
    	$view = new ViewModel();
    	$view->setTerminal(true);
    	exit;
    }
    
    public function servicosAction() {
    	if (isset($_GET['wsdl'])) {
    		$this->handleWSDL('/index/servicos', '\WS\Service\Servico');
    	} else {
    		$this->handleSOAP('/index/servicos?wsdl', '\WS\Service\Servico');
    	}
    	 
    	$view = new ViewModel();
    	$view->setTerminal(true);
    	exit;
    }
    
    public function academiasAction(){
        if (isset($_GET['wsdl'])) {
    		$this->handleWSDL('/index/academias', '\WS\Service\Academia');
    	} else {
    		$this->handleSOAP('/index/academias?wsdl', '\WS\Service\Academia');
    	}
    	//$this->setViewOptions();
        $view = new ViewModel();
    	$view->setTerminal(true);
    	exit;
    }
    
     public function alunosAction(){
         
        if (isset($_GET['wsdl'])) {
    		$this->handleWSDL('/index/alunos', '\WS\Service\Aluno');
    	} else {
    		$this->handleSOAP('/index/alunos?wsdl', '\WS\Service\Aluno');
    	}
    	$this->setViewOptions();
    }
    
    public function handleWSDL($local, $class) {
    	$autoDiscover = new AutoDiscover();
    	$autoDiscover->setClass($class);
    	$autoDiscover->setUri($this->_WSDL_URI . $local);
    	$autoDiscover->setServiceName('serverAcademia');
    	
    	$wsdl = $autoDiscover->generate();
        $wsdl = $wsdl->toDomDocument();


        echo $wsdl->saveXML();
    }
    
    public function setViewOptions(){
        $view = new ViewModel();
    	$view->setTerminal(true);
    	exit;
    }
    
    public function handleSOAP($local, $class) {
    	$soap = new Server($this->_WSDL_URI . $local);
    	$soap->setClass($class);
        $soap->setObject(new $class($this->getServiceLocator()->get('Doctrine\ORM\EntityManager')));
    	$soap->handle();
    }
}

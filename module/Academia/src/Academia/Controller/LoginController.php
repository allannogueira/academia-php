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
use Zend\Authentication\Result;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable;



class LoginController extends AbstractController
{
    
    public function __construct(){        
        $this->form = 'Academia\Form\LoginForm';
    }
    
    /*
    public function inserirAction() {
       $this->form = $this->getServiceLocator()->get($this->form);
       return parent::inserirAction();
    }*/
    
    
    public function indexAction() {
        $form = $this->getServiceLocator()->get($this->form);
        $viewModel = new ViewModel(['form' => $form]);        
        return $viewModel;
    }
    
    public function loginAction()
    {
        
        $data = $this->getRequest()->getPost();

        // If you used another name for the authentication service, change it here
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
        $adapter = $authService->getAdapter();
        $adapter->setIdentityValue($data['academia']);
        $adapter->setCredentialValue($data['senha']);
        $authResult = $authService->authenticate();
        
       
        if ($authResult->isValid()) {
            /*Define quem vai ter autorização do que no sistema*/
            
            $this->setAutorizacao();
            /*redireciona para home*/
            return $this->redirect()->toRoute('home');
        }
        
        //login inválido, retorna para a tela de login
        return $this->redirect()->toRoute('login');
    }
    
    public function logoutAction(){
        //echo var_dump($this->identity());
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $authService->clearIdentity();
        return $this->redirect()->toRoute('login');//login inválido
       // echo var_dump($this->identity());exit;
    }
    
    
    
}

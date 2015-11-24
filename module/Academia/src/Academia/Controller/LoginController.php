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
use Zend\Session\Container;




class LoginController extends AbstractController
{

    
    public function __construct(){      
        //die('LoginController');
     // echo "LoginContrller";
        $this->form = 'Academia\Form\LoginForm';
        $this->controller = 'LoginController';
         $this->service = 'Academia\Service\LoginService';
        $this->entity = 'Academia\Model\Login';
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
       //pega os post do formulario
        $data = $this->getRequest()->getPost();
        
        // If you used another name for the authentication service, change it here
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
        $adapters = $this->getServiceLocator()->get("adapters");//recupera do serviço abaixo em Module.php
        $storages = $this->getServiceLocator()->get('storages');//recupera do serviço abaixo em Module.php
        //percorre todos os adaptadores
        foreach($adapters as $index => $adapter){
            $authService->setStorage($storages[$index]);//get storage da classe Module.php
            $authService->setAdapter($adapters[$index]);//get adaptador da classe Module.php

            $adapter = $authService->getAdapter();
            
            
            $adapter->setIdentityValue($data->usuario);
            $adapter->setCredentialValue(md5($data->senha));
            if ($authService->authenticate()->isValid()){
                /*Define quem vai ter autorização do que no sistema*/
                 $session = new Container();
                 $session->authenticate = $authService->authenticate();
                $this->setAutorizacao();
                  //echo var_dump($authResult);exit;
                /*redireciona para home*/
                return $this->redirect()->toRoute('home');
            }
        }
        $this->redirect()->toRoute('home');
    }
    
    
    public function logoutAction(){
        $session = new Container();
        
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
      
        $authService->clearIdentity();
        $session->layout = "layout/layout";
        
        $session->offsetUnset("authenticate");
        $session->offsetUnset("quemEstaLogado");
        
        return $this->redirect()->toRoute('home');//login inválido
       // echo var_dump($this->identity());exit;
    }
    
     

    
}

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
use Zend\Authentication\Result;



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
       // $authServer = $this->getServiceLocator()->get('doctrine.authenticationservice.orm_default');
        $authServer = new \Zend\Authentication\AuthenticationService();
        $adapter = new \DoctrineModule\Authentication\Adapter\ObjectRepository(array(
            'objectManager' => $this->getEm(),
            'identityClass' => 'Academia\Entity\Login',
            'identityProperty' => 'email',
            'credentialProperty' => 'senha'/*,
            'credentialCallable' => 'Academia\Entity\Login::hashPassword'*/
        ));        
         
       //pega os post do formulario
        $data = $this->getRequest()->getPost();
        $adapter->setIdentityValue($data->email);
        $adapter->setCredentialValue($data->senha);
        $authServer->setAdapter($adapter);
        $result = $authServer->authenticate();
        
        switch ($result->getCode()) {

            case Result::FAILURE_IDENTITY_NOT_FOUND:
                return new ViewModel(['error' => "Email Inválido."]);   
                break;

            case Result::FAILURE_CREDENTIAL_INVALID:
                return new ViewModel(['error' => "Senha inválida."]);   
                break;

            case Result::SUCCESS:
                $this->selecionaTemplate();
                $this->redirect()->toRoute('home')->setMetadata(array('success'=> "Bem Vindo!"));
                
                break;

            default:
                return new ViewModel(['error' => "Login Inválido, tente novamente."]);   
                break;
        }
    }
    
    public function selecionaTemplate(){
        /*1	aluno
        2	academia
        3	profissional
        4	administrador*/
        $session = new Container();
        $tipoUsuario = $this->identity()->getCodTipoLogin()->getCodTipoLogin();//recupera o codigo tipo do login
        
        switch ($tipoUsuario){
           case 1: 
               $session->layout = "layout/layoutAluno";
               break;
           case 2:
                $session->layout = "layout/layoutAcademia";
               break;
           case 3:
                $session->layout = "layout/layoutProfissional";
               break;
           case 4:
                $session->layout = "layout/layoutAdmin";
               break;
        }
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

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
use DoctrineModule\Options\Authentication;
use DoctrineModule\Authentication\Storage\ObjectRepository as StorageObjectRepository;
use DoctrineModule\Authentication\Adapter\ObjectRepository as ObjectRepositoryAdapter;
use Zend\Authentication\Storage\Session;
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
       // echo "rwarw";exit;
        $data = $this->getRequest()->getPost();

        // If you used another name for the authentication service, change it here
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
        
        $adapterAcademia = new ObjectRepositoryAdapter([
            'object_manager' => $this->getEm(),
            'identity_class' => 'Academia\Entity\Academia',
            'identity_property' => 'usuario',
            'credential_property' => 'senha',
            'storage' => 'DoctrineModule\Authentication\Storage\Session',
        ]);
        
        $adapterAluno = new ObjectRepositoryAdapter([
            'object_manager' => $this->getEm(),
            'identity_class' => 'Academia\Entity\Aluno',
            'identity_property' => 'usuario',
            'credential_property' => 'senha',
            'storage' => 'DoctrineModule\Authentication\Storage\Session',
        ]);
        
        $adapters = ["0" => $adapterAluno,"1" => $adapterAcademia];
        
        //echo var_dump($adapters);exit;
        foreach($adapters as $index => $adapter){
           
            if($index == 0){
                $objStorage = new StorageObjectRepository(
                    new Authentication([
                            'object_manager' => $this->getEm(),
                            'identity_class' => 'Academia\Entity\Aluno',
                            'identity_property' => 'usuario',
                            'credential_property' => 'senha',
                            'storage' => new Session(),
                    ])
                );
            }else{
                 $objStorage = new StorageObjectRepository(
                    new Authentication([
                            'object_manager' => $this->getEm(),
                            'identity_class' => 'Academia\Entity\Academia',
                            'identity_property' => 'usuario',
                            'credential_property' => 'senha',
                            'storage' => new Session(),
                    ])
                );
            }
            
            $authService->setStorage($objStorage);
            
            $authService->setAdapter($adapter);
            $adapter = $authService->getAdapter();
            $adapter->setIdentityValue($data['usuario']);
            $adapter->setCredentialValue($data['senha']);
            $authResult = $authService->authenticate();
           // echo var_dump($authResult);exit;
            if ($authResult->isValid()) {
                /*Define quem vai ter autorização do que no sistema*/
               
                $this->setAutorizacao();
                  //echo var_dump($authResult);exit;
                /*redireciona para home*/
                return $this->redirect()->toRoute('home');
            }
        }
        //login inválido, retorna para a tela de login
        echo var_dump($authResult);exit;
        echo "Login Inválido";
        return;// $this->redirect()->toRoute('login');
    }
    
    
    public function logoutAction(){
        $session = new Container();
        //echo var_dump($this->identity());
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $authService->clearIdentity();
        $session->layout = "layout/layout";
        
        return $this->redirect()->toRoute('home');//login inválido
       // echo var_dump($this->identity());exit;
    }
    
    
}

<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Academia\Entity\Aluno;
use Academia\Entity\Endereco;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

abstract class AbstractController extends AbstractActionController
{
    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;
    protected $acl;
    
    abstract function __construct();
    /**
     * Lista Resultados
     * @return array|void
     */
    public function listarAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->findAll();
        
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));//paginacao trazendo todos nosso resultado
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(10); //qual numero da pagina que estamos??
        $view = new ViewModel(['data'=> $paginator, 'page' => $list]);//retorna para a pagina as paginas com a lista de paginas
       // $view->setTerminal(true); 
        return $view;
    }
    
    /*
     * Inserir Registro
     */
    public function inserirAction(){
     /*   echo "<pre>";
        print_r($this);
        echo "</pre>";*/
       $this->setAutorizacao();
       if (!$this->acl->isAllowed('aluno', 'inserir') && !$this->acl->isAllowed('academia', 'inserir')) 
       {
           echo "Sem permissão";
           return false;//sem permissao
        }
        
       // echo var_dump($this->getIdentity);
        if(is_string($this->form)){
        
           // $formManager = $this->serviceLocator->get('FormElementManager');
            
             //$form = $formManager->get($this->form);
             
             $form = new $this->form;
        }
        else
            $form = $this->form;
        
        $request = $this->getRequest(); 
        
        // echo var_dump($request->getPost());
        if($request->isPost()) { 
          // echo var_dump($request->getPost());
                 
               $form->setData($request->getPost());
               
              // echo var_dump($form->isValid());exit;
              // if($form->isValid()){
                  // echo var_dump($request->getPost());exit;
             //  echo var_dump($this->service);
                   $service = $this->getServiceLocator()->get($this->service);            
              //  print_r($service);exit;
                    if($service->save($request->getPost()->toArray())){
                        
                        $this->flashMessenger()->addSuccessMessage("Cadastrado com Sucesso!");
                    }else{
                       
                        $this->flashMessenger()->addErrorMessage("Não foi possível cadastrar, tente novamente mais tarde.");
                    }
                  
                    return $this->redirect()->toRoute($this->route,['controller'=> $this->controller]);//redureciona para o controller que será indicado
             //   }
                /* else {
                    // email is invalid; print the reasons
                    foreach ($form->getMessages() as $messageId => $message) {
                        echo "Validation failure '$messageId': $message\n";
                    }
                    exit;
                }        */

        }
       // echo var_dump($this);
        if ($this->flashMessenger()->hasSuccessMessages()) {//se existir alguma msg de sucesso
            return new ViewModel([
                'form' => $form, 
                'success' => $this->flashMessenger()->getSuccessMessages()
            ]);
        }
        
        if ($this->flashMessenger()->hasErrorMessages()) {//se existir alguma msg de sucesso
            return new ViewModel([
                'form' => $form, 
                'success' => $this->flashMessenger()->getErrorMessages()
            ]);
        }
        
        $this->flashMessenger()->clearMessages();
        
        //se for uma requisicao ajax
         if($this->getRequest()->isXmlHttpRequest()) {
            $this->layout('layout/layoutAjax');//muda para um layout sem menu e rodape
         }
        $view = new ViewModel(['form' => $form]);
        
       
        return $view;
    }
    
    /*
     * Edita um registro
     */
    public function editarAction(){
       $this->setAutorizacao();
       if (!$this->acl->isAllowed('aluno', 'editar') && !$this->acl->isAllowed('academia', 'editar')) 
       {
           echo "Sem permissão";
           return false;//sem permissao
        }
     /*   if(is_string($this->form))//formulario´é uma string
            $form = new $this->from;//instancia um novo formulario
        else
            $form = $this->form;//retorna o formulario já referenciado
       */
        
        $formManager = $this->serviceLocator->get('FormElementManager');
            
             $form = $formManager->get($this->form);
             
        $request = $this->getRequest();
        
        $param = $this->params()->fromRoute('id',0);//se nao passar nenhum parametro coloca com id 0        
        $repository = $this->getEm()->getRepository($this->entity)->find($param);//procura no banco um registro com esse id
        
        if($repository){
            
            //convertendo objeto data para um string
            $array = array();
            
            foreach($repository->toArray() as $key => $value){
                //echo "teste"; die;
                if($value instanceof \DateTime) {
                    $array[$key] = $value->format('d/m/Y');
                }else if($value instanceof \Academia\Entity\Endereco){
                    $array[$key] = $value->toArray();                
                }else{
                    $array[$key] = $value;
                }
            }
            
            //convertendo em array
            if(isset($array['endereco']['cepbr_endereco_cep']))
                $array['endereco']['cepbr_endereco_cep'] = $array['endereco']['cepbr_endereco_cep']->toArray();
         
           // echo var_dump($array);die;
            
            
            $form->setData($array);
            if($request->isPost()){
              $form->setData($request->getPost());
              // if($form->isValid()){
                   $service = $this->getServiceLocator()->get($this->service);
                   //pega id do registro que será atualizado
                   $data = $request->getPost()->toArray();
                   $data['id'] = (int) $param;
             //  }
                  // echo $param;die;
               
               if($service->save($data)){
                   $this->flashMessenger()->addSuccessMessage("Atualizado com Sucesso!");
               }else{
                   $this->flashMessenger()->addErrorMessage("Não foi possível atualizar, tente novamente mais tarde.");
               }
               return $this->redirect()->toRoute($this->route,['controller'=> $this->controller]);//redureciona para o controller que será indicado
            }
        }else{//nao encontrou nenhum registro
             
            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado');
            return $this->redirect()->toRoute($this->route, ['controller'=>$this->controller]);//retorna para o controlador referenciado
        }
        
        if ($this->flashMessenger()->hasSuccessMessages()) {//se existir alguma msg de sucesso
            return new ViewModel([
                'form' => $form, 
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param
            ]);
        }

        if ($this->flashMessenger()->hasErrorMessages()) {//se existir alguma msg de sucesso
            return new ViewModel([
                'form' => $form, 
                'success' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param
            ]);
        }
        
        if ($this->flashMessenger()->hasInfoMessages()) {//não é um erro, apenas um aviso
            return new ViewModel([
                'form' => $form, 
                'success' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param
            ]);
        }
        
        $this->flashMessenger()->clearMessages();
        return new ViewModel([
            'form' => $form, 
            'id' => $param
        ]);
    }
    
    /*
     * Exclui um registro
     */
    public function excluirAction(){
        $this->setAutorizacao();
       if (!$this->acl->isAllowed('aluno', 'excluir') && !$this->acl->isAllowed('academia', 'excluir')) 
       {
           echo "Sem permissão";
           return false;//sem permissao
        }
        
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['id'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
    
    public function viewAction(){
        //retorna view sem nenhum template
    }
    /*
     * @return Doctrine\ORM\EntityManager
     */
     public function getEm(){
        if($this->em == null){
            $this->em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        }
        return $this->em;
    }
    
    public function setAutorizacao(){
        $acl = new Acl();
        $this->setAcl($acl);
        
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
        $this->acl->addRole(new Role('academia'));
        $this->acl->addRole(new Role('aluno'));
        
        $this->acl->addResource(new Resource('inserir'));
        $this->acl->addResource(new Resource('listar'));
        $this->acl->addResource(new Resource('index'));
        $this->acl->addResource(new Resource('excluir'));
            
        if ($authService->getIdentity() instanceof \Academia\Entity\Academia){
             $this->acl->allow('academia', array('index','inserir','listar','excluir'));
          // $this->layout('layout/layoutAjax');//muda para um layout sem menu e rodape
            /*fim autorizacao*/
        }else if($authService->getIdentity() instanceof \Academia\Entity\Aluno){
            $this->acl->allow('aluno', array('index','listar'));
            
        }
        
        //echo ($acl->isAllowed('aluno', 'editar') || $acl->isAllowed('academia', 'editar')) ? 'allowed' : 'denied';die("LoginController")   ;
    }
    
    public function getAcl(){
        return $this->acl;
    }
    
    public function setAcl($acl){
        $this->acl = $acl;
    }
    
}

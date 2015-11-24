<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;
use Zend\Session\Container;

abstract class AbstractController extends AbstractActionController
{
    protected $em = null;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;
    protected $acl;
    public $layout;
    
    abstract function __construct();
    
     public function onDispatch( \Zend\Mvc\MvcEvent $e )
    {
         
        $sessao = new Container();
        $this->layout($sessao->layout);//muda para o layout definido ao fazer login
         //  echo var_dump($this->layout);exit;
        return parent::onDispatch( $e );
    }

        
    /**
     * Lista Resultados
     * @return array|void
     */
    public function listarAction($where = "")
    {
        $sessao = new Container();
        $id = $sessao->authenticate->getIdentity()->getId();//id da academia ou do alluno
        
        $whereID = "";
        
         //é um aluno ou uma academia
        if($sessao->quemEstaLogado == 'aluno'){
            //se for um aluno poderá visualizar somente os dados dele mesmo
            //Lista somente os alunos com ID igual ao da sessao para um nao ver o do outro
            //$query = "select t from $this->entity t where t.id = $id";
            $whereID = "and t.id = $id";
           // $list = $this->getEm()->createQuery("")->getResult();
        }else if($sessao->quemEstaLogado == 'academia'){
            
            //se for uma academia poderá visualizar os dados de todos os alunos da academia dela e nao de outras academias
            //lembrando que deve ter na Entity um getAcademia() e setAcademia() para encontrar um resultado no banco
            if($this->entity == "Academia\Entity\Aluno"){
                //$query = "select t from $this->entity t where t.academiaId = $id";
                $whereID = "and t.academiaId = $id";
            }else if($this->entity == "Academia\Entity\Academia"){
                //$query = "select t from $this->entity t where t.id = $id";
                $whereID = "and t.id = $id";
            }else{
                //$query = "select t from $this->entity t where t.id = $id";
                $whereID = "and t.id = $id";
              //   $list = $this->getEm()->createQuery("select t from $this->entity t where t.id = $id")->getResult();
            }
        }/*else{//se for admin
            $query = "select t from $this->entity t";
        }*/
            
        $query = "select t from $this->entity t $where $whereID";
        //echo var_dump($query);
        $list = $this->getEm()->createQuery($query)->getResult();//faz o select no banco de dados
        $page = $this->params()->fromRoute('page');//recupera o parametro page da url
      //  $action = $this->params()->fromRoute('action');//recupera o parametro action da url
        //$nomePagina = $this->params()->fromRoute('nomePag');//recupera o parametro nomePag da url
        //$baseUrl = "/".$nomePagina."/".$action."/";//monta baseUrl exemplo /aluno/listar/
    
       // echo var_dump($page);
        $paginator = new Paginator(new ArrayAdapter($list));//paginacao trazendo todos nosso resultado
        $paginator->setCurrentPageNumber($page)//seta a pagina atual que será paginada
                ->setDefaultItemCountPerPage(10); //quantidade de paginas que será feito a busca
        $view = new ViewModel(['data'=> $paginator, 'page' => $page]);//retorna para a pagina as paginas com a lista de paginas
       // $view->setTerminal(true); 
        return $view;
    }
    
    /*public function listarAction(){
        $listarAction = $this->listarAction;
        $objCliente = new \WS\Controller\ClienteController();
        $encodedValue = $objCliente->$listarAction()->getVariable('retorno');
        $list = \Zend\Json\Json::decode($encodedValue, \Zend\Json\Json::TYPE_ARRAY);
        $view = new \Zend\View\Model\ViewModel(['data'=> $list]);//retorna para a pagina as paginas com a lista de paginas
        return $view;
    }*/
    
    /*
     * Inserir Registro
     */
    public function inserirAction(){
        echo $this->params()->fromRoute('nomePag');
        $sessao = new Container();
        
     /*   echo "<pre>";
        print_r($this);
        echo "</pre>";*/
        if(is_string($this->form)){

             $formManager = $this->serviceLocator->get("FormElementManager");

              $form = $formManager->get($this->form);

              ///$form = new $this->form;
             // echo "asdfas";
         }
         else{
             $form = $this->form;
         }
                 
        
        //verifica se o aluno tem permissao para inserir, ou se a academia tem permissao para inserir 
       if ($sessao->acl->isAllowed('aluno', 'inserir') || $sessao->acl->isAllowed('academia', 'inserir') || $sessao->acl->isAllowed('profissional','inserir') ||  $sessao->acl->isAllowed('admin','inserir')) 
       {
               

                
               // echo var_dump($this->getIdentity);
               

                 $request = $this->getRequest(); 

                //  echo var_dump($request->getPost());
                 if($request->isPost()) { 
               //     echo var_dump($request->getPost());

                        $form->setData($request->getPost());

                      //  echo var_dump($form->isValid());exit;
                      //  echo var_dump($form);
                                
                        if($form->isValid()){
                         //   echo var_dump($request->getPost());exit;
                       // echo var_dump($this->service);exit;
                            $service = $this->getServiceLocator()->get($this->service);            
                         
                            //echo var_dump($request->getPost()->toArray());exit;
                             if($service->save($request->getPost()->toArray())){

                                 $this->flashMessenger()->addSuccessMessage("Cadastrado com Sucesso!");
                             }else{

                                 $this->flashMessenger()->addErrorMessage("Não foi possível cadastrar, tente novamente mais tarde.");
                             }

                             return $this->redirect()->toRoute($this->route,['controller'=> $this->controller]);//redureciona para o controller que será indicado
                         }
                          else {
                              echo "formulario nao eh valido";
                             // email is invalid; print the reasons
                             foreach ($form->getMessages() as $messageId => $message) {
                                 //echo var_dump($message);
                                 foreach($message as $descricao)
                                 echo "Validation failure '$messageId': $descricao\n";
                             }
                           //  exit;
                         }      

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
                /*  if($this->getRequest()->isXmlHttpRequest()) {
                     $this->layout('layout/layoutAjax');//muda para um layout sem menu e rodape
                  }*/
                 $view = new ViewModel(['form' => $form]);


                 return $view;
        
       }else{
             $this->flashMessenger()->addErrorMessage("Sem permissão.");
            if ($this->flashMessenger()->hasErrorMessages()) {//se existir alguma msg de sucesso
                return new ViewModel([
                    'form' => $form, 
                    'success' => $this->flashMessenger()->getErrorMessages()
                ]);
            }
       }
    }
    
    /*
     * Edita um registro
     */
    public function editarAction(){
         $sessao = new Container();
       if ($sessao->acl->isAllowed('aluno', 'editar') || $sessao->acl->isAllowed('academia', 'editar') || $sessao->acl->isAllowed('admin', 'editar') || ($sessao->acl->isAllowed('profissional', 'editar') && $this->entity == "Academia\Entity\Exercicios")) 
       {
           /*if($sessao->acl->isAllowed('aluno','editar')){
                 $authenticationService = $this->serviceLocator->get('Zend\Authentication\AuthenticationService');
                   $loggedUser = $authenticationService->getIdentity();
                   echo var_dump($loggedUser);
            /*   if(is_string($this->form))//formulario´é uma string
                   $form = new $this->from;//instancia um novo formulario
               else
                   $form = $this->form;//retorna o formulario já referenciado
              */
          // }       
          
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
                //   if(isset($array['endereco']['cepbr_endereco_cep']))
                //       $array['endereco']['cepbr_endereco_cep'] = $array['endereco']['cepbr_endereco_cep']->toArray();

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
                      return $this->redirect()->toRoute($this->route,['controller'=> $this->controller,'action' => 'editar','id'=>$data['id']]);//redureciona para o controller que será indicado
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
    }
    /*
     * Exclui um registro
     */
    public function excluirAction(){
        $sessao = new Container();
       if (!$sessao->acl->isAllowed('aluno', 'excluir') && !$sessao->acl->isAllowed('academia', 'excluir') && !$sessao->acl->isAllowed('admin', 'excluir') ) 
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
    
    public function indexAction(){
        $this->layout($this->layout);
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
    
    public function setEm($em){
        $this->em = $em;
    }
    
    public function setAutorizacao(){
       
        $sessao = new Container();
        $sessao->acl = new Acl();  
       
        
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        
        $sessao->acl->addRole(new Role('academia'));
        $sessao->acl->addRole(new Role('aluno'));
        $sessao->acl->addRole(new Role('admin'));
        $sessao->acl->addRole(new Role('profissional'));
        
        $sessao->acl->addResource(new Resource('inserir'));
        $sessao->acl->addResource(new Resource('editar'));
        $sessao->acl->addResource(new Resource('listar'));
        $sessao->acl->addResource(new Resource('index'));
        $sessao->acl->addResource(new Resource('excluir'));
        
           //echo var_dump($this->identity());exit;
        if ($this->identity() instanceof \Academia\Entity\Academia){
             $sessao->acl->allow('academia', array('index','inserir','editar','listar','excluir'));
             $this->layout = 'layout/layoutAcademia';
             $sessao->quemEstaLogado = 'academia';
            // echo $this->layout;exit;
           //  echo var_dump( $this->acl->isAllowed('academia', 'editar'));exit;
            /*fim autorizacao*/
        }else if($this->identity() instanceof \Academia\Entity\Aluno){
            $sessao->acl->allow('aluno', array('index','listar','editar'));
            $this->layout = 'layout/layoutAluno';//muda para um layout com menu diferente
             $sessao->quemEstaLogado = 'aluno';
        }else if($this->identity() instanceof \Academia\Entity\Admin){
            $sessao->acl->allow('admin', array('index','listar','editar','excluir','inserir'));
            $this->layout = 'layout/layoutAdmin';//muda para um layout com menu diferente
             $sessao->quemEstaLogado = 'admin';
        }else if($this->identity() instanceof \Academia\Entity\Profissional){
            $sessao->acl->allow('profissional', array('index','listar','editar','inserir'));
            $this->layout = 'layout/layoutProfissional';//muda para um layout com menu diferente
             $sessao->quemEstaLogado = 'profissional';
        }
        $sessao = new Container();
        $sessao->layout = $this->layout;
        echo $sessao->layout;
         $this->layout()->setTemplate($this->layout);//muda para um layout com menu diferente
        //echo ($acl->isAllowed('aluno', 'editar') || $acl->isAllowed('academia', 'editar')) ? 'allowed' : 'denied';die("LoginController")   ;
    }
    

}

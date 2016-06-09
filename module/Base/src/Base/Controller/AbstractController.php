<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
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
    protected $resultData;
    public $layout;
    
    abstract function __construct();
    
     public function onDispatch( \Zend\Mvc\MvcEvent $e )
    {
        $sessao = new Container();
       // $this->layout($sessao->layout);//muda para o layout definido ao fazer login
         //  echo var_dump($this->layout);exit;
        return parent::onDispatch( $e );
    }

        
    /**
     * Lista Resultados
     * @return array|void
     */
    public function listarAction($where = "")
    {    
       // if(method_exists($this->entity,'getIdAcademia')){
        if($this->getFilterAcademia() != ""){
            if($where == ""){
                $where = "where ".$this->getFilterAcademia();
            }else{
                $where .= " and ".$this->getFilterAcademia();
            }
        }
        //}
        
        $query = "select t from $this->entity t $where";
       // echo var_dump($query);
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
        if(is_string($this->form)){
            $forms = $this->getServiceLocator()->get('FormElementManager');
            $form = $forms->get($this->form, array());
        }
        else{
            $form = $this->form;
        }
        $entity = new $this->entity();
        
        $form->bind($entity);
        if($this->request->isPost()){ 
            //echo var_dump($this->request->getPost());
            $post = $this->request->getPost()->toArray();
            $file = $this->request->getFiles()->toArray();
            
            
            $postData = array_merge_recursive($post,$file);
            $form->setData($postData);
            
            if($form->isValid()){
                //se existir algum upload de arquivo, deixe com o nome de "arquivo" para padronizar
               if(isset($postData['fotoWebcan'])){
                        if($postData['fotoWebcan'] != ""){
                            $postData['arquivo'] = $postData['fotoWebcan'];
                        }else{
                                  if(isset($postData['arquivo'])){
                                        $data = $form->getData();
                                        $path = $data->getArquivo()['tmp_name'];
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        if(!empty($path)){
                                            $postData['arquivo'] = file_get_contents($path);
                                            $postData['arquivo'] =  'data:image/' . $type . ';base64, ' . base64_encode($postData['arquivo']);
                                      
                                }else{
                                    $postData['arquivo'] = "";
                                }
                            
                        }
                    }}
                $service = $this->getServiceLocator()->get($this->service);
                
                if($service->save($postData)){
                    $this->flashMessenger()->addSuccessMessage("Cadastrado com Sucesso!");
                }else{
                    $this->flashMessenger()->addErrorMessage("Não foi possível cadastrar, tente novamente mais tarde.");
                }
                return $this->redirect()->toRoute($this->route,['controller'=> $this->controller]);//redureciona para o controller que será indicado
            }
            else {
                $this->flashMessenger()->addErrorMessage("formulário nao é valido");
               /* foreach ($form->getMessages() as $messageId => $message) {
                    foreach($message as $descricao)
                        echo "Validation failure '$messageId': $descricao\n";
                }*/
            }      

        }
                 
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
        $view = new ViewModel(['form' => $form]);
        return $view;
     
    }
    
    /*
     * Edita um registro
     */
    public function editarAction(){
               
        if(is_string($this->form)){
            $forms = $this->getServiceLocator()->get('FormElementManager');
            $form = $forms->get($this->form, array());
        }else{
            $form = $this->form;
        }
       
        $request = $this->getRequest();
        $param = $this->params()->fromRoute('id',0);//se nao passar nenhum parametro coloca com id 0     
        
        $repository = $this->getEm()->getRepository($this->entity)->find($param);
        
        if($repository != null){  
            $form->bind($repository);
            
            if($request->isPost()){//se é um POST
                
                $form->setData($this->getRequest()->getPost());
                $service = $this->getServiceLocator()->get($this->service);
                
                 $post = $this->request->getPost()->toArray();
                $file = $this->request->getFiles()->toArray();
                
                $postData = array_merge_recursive($post,$file);
                $form->setData($postData);
                $postData['id'] = (int) $param;
                
                if ($form->isValid()){
                    if(isset($postData['fotoWebcan'])){
                        if($postData['fotoWebcan'] != ""){
                            $postData['arquivo'] = $postData['fotoWebcan'];
                        }else{
                                  if(isset($postData['arquivo'])){
                                        $data = $form->getData();
                                        $path = $data->getArquivo()['tmp_name'];
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        if(!empty($path)){
                                            $postData['arquivo'] = file_get_contents($path);
                                            $postData['arquivo'] =  'data:image/' . $type . ';base64, ' . base64_encode($postData['arquivo']);
                                      
                                }else{
                                    $postData['arquivo'] = "";
                                }
                            
                        }
                    }}
                    

                    if($service->save($postData)){
                        $this->flashMessenger()->addSuccessMessage("Atualizado com Sucesso!");
                    }else{
                        $this->flashMessenger()->addErrorMessage("Não foi possível atualizar, tente novamente mais tarde.");
                    }
                    return $this->redirect()->toRoute($this->route,['controller'=> $this->controller,'action' => 'editar','id'=>$postData['id']]);//redureciona para o controller que será indicado
                }
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
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['id'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        $this->flashMessenger()->clearMessages();
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
    
    public function indexAction(){
    //    $this->layout($this->layout);
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
       
      /*  $sessao = new Container();
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
   /*     }else if($this->identity() instanceof \Academia\Entity\Aluno){
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
        //echo ($acl->isAllowed('aluno', 'editar') || $acl->isAllowed('academia', 'editar')) ? 'allowed' : 'denied';die("LoginController")   ;*/
    }
    
    public function getFilterAcademia(){
        $session = new \Zend\Session\Container();
        $academia = "";
         if(method_exists($this->entity,'getIdAcademia')){
            if($session['idAcademia'] != ""){
                $academia = "t.idAcademia = ".$session['idAcademia'];
            }
         }
        return $academia;
    }
}

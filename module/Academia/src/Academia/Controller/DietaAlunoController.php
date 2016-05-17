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
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class DietaAlunoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\DietaAlunoForm';
        $this->controller = 'DietaAlunoController';
        $this->route = 'dietaAluno';
        $this->service = 'Academia\Service\DietaAlunoService';
        $this->entity = 'Academia\Entity\DietaAluno';
    }
 
    public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idDietaAluno'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }
    
    public function getDietaAlunoAction(){
        $idAluno = $this->params()->fromRoute("id");
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('da','dg','dali')
                ->from('Academia\Entity\DietaAluno', 'da')
                ->join('da.idDietaGeral','dg')
                ->join('Academia\Entity\DietaAlimento','dali','dali.idDietaGeral = dg.idDietaGeral')
                ->where("da.idAluno = '".$idAluno."'");
                ;
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
            // ->where('a.idAluno = 1');
        $data = $qb->getQuery()->getResult();
        $view = new ViewModel(["data"=> $data]);
        return $view;
   }
   
    public function listarAction($where = "")
    {    
        $session = new \Zend\Session\Container();
        $academia = "";
        if($session['idAcademia'] != ""){
            $academia = "where da.idAcademia = ".$session['idAcademia'];
        }
        
        $query = "select t from $this->entity t inner join t.idAluno da $academia";
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
}

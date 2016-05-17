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
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\View\Model\ViewModel;

class MedidaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\MedidaForm';
        $this->controller = 'TreinoController';
        $this->route = 'medida';
        $this->service = 'Academia\Service\MedidaService';
        $this->entity = 'Academia\Entity\Medida';
        $this->listarAction = "medidasAction";//nome da chamada no webservice
    }
    
    public function listarAction($where = ""){
        $idAluno = $this->params()->fromPost("idAluno")["idAluno"];
        
        $forms = $this->getServiceLocator()->get('FormElementManager');
        $form = $forms->get("FiltroAlunoForm", array());
            
        $where = "where (t.idAluno = '".$idAluno."' or '".$idAluno."' = '')";
        $query = "select t from $this->entity t $where";
        
        $list = $this->getEm()->createQuery($query)->getResult();//faz o select no banco de dados
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));//paginacao trazendo todos nosso resultado
        $paginator->setCurrentPageNumber($page)//seta a pagina atual que será paginada
                ->setDefaultItemCountPerPage(10); //quantidade de paginas que será feito a busca
        $view = new ViewModel(['data'=> $paginator, 'page' => $page, 'form' => $form]);//retorna para a pagina as paginas com a lista de paginas
        return $view;
   }
    
   public function getMediaCrescimentoAction(){
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('m')
             ->from('Academia\Entity\Medida', 'm');
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
            // ->where('a.idAluno = 1');
        $data = $qb->getQuery()->getResult();
        $view = new ViewModel(["data"=> $data]);
        return $view;
   }
   
   public function getPesoAction(){
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('m')
             ->from('Academia\Entity\Medida', 'm');
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
            // ->where('a.idAluno = 1');
        $data = $qb->getQuery()->getResult();
        $view = new ViewModel(["data"=> $data]);
        return $view;
   }
   
   public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($service->remove(['idMedida'=>$id])){
            $this->flashMessenger()->addSuccessMessage("Deletado com sucesso!");
        }else{
            $this->flashMessenger()->addErrorMessage("Não foi possível deletar o registro!");
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'listar'));
    }

}

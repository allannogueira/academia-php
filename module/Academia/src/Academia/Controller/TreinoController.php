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

class TreinoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\TreinoForm';
        $this->controller = 'TreinoController';
        $this->route = 'treino';
        $this->service = 'Academia\Service\TreinoService';
        $this->entity = 'Academia\Entity\Treino';
        $this->listarAction = "treinosAction";//nome da chamada no webservice
    }
    
    
   public function listarAction($where = ""){
        $idAluno = $this->params()->fromPost("idAluno")["idAluno"];
        $idTreinoGeral = $this->params()->fromPost("idTreinoGeral")["idTreinoGeral"];
        
        $forms = $this->getServiceLocator()->get('FormElementManager');
        $form = $forms->get("FiltroTreinoAlunoForm", array());
            
        $where = "where (t.idAluno = '".$idAluno."' or '".$idAluno."' = '') and "
                . "(t.idTreinoGeral = '".$idTreinoGeral."' or '".$idTreinoGeral."' = '')";
        $query = "select t from $this->entity t $where";
        
        $list = $this->getEm()->createQuery($query)->getResult();//faz o select no banco de dados
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));//paginacao trazendo todos nosso resultado
        $paginator->setCurrentPageNumber($page)//seta a pagina atual que será paginada
                ->setDefaultItemCountPerPage(10); //quantidade de paginas que será feito a busca
        $view = new ViewModel(['data'=> $paginator, 'page' => $page, 'form' => $form]);//retorna para a pagina as paginas com a lista de paginas
        return $view;
   }
   
   public function getTreinoAlunoAction(){
        $idAluno = $this->params()->fromRoute("id");
        
        $qb = $this->getEm()->createQueryBuilder();
        $qb->select('t','tg','te','e')
                ->from('Academia\Entity\Treino', 't')
                ->join('t.idTreinoGeral','tg')
                ->join('Academia\Entity\TreinoExercicio','te','te.idTreinoGeral = tg.idTreinoGeral')                
                ->join('te.idExercicio','e')
                ->where("t.idAluno = '".$idAluno."' and t.dataFimVig >= CURRENT_DATE()");
                
           //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
            // ->where('a.idAluno = 1');
        $data = $qb->getQuery()->getResult();
        $view = new ViewModel(["data"=> $data]);
        return $view;
   }
}

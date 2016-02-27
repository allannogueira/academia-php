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

class TreinoExercicioController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\TreinoExercicioForm';
        $this->controller = 'TreinoExercicioController';
        $this->route = 'treinoExercicio';
        $this->service = 'Academia\Service\TreinoExercicioService';
        $this->entity = 'Academia\Entity\TreinoExercicio';
    }
    
    public function listarAction($where=""){
        
        $idTreinoGeral = $this->params()->fromPost("idTreinoGeral")["idTreinoGeral"];
        $idExercicio = $this->params()->fromPost("idExercicio")["idExercicio"];
        
        $forms = $this->getServiceLocator()->get('FormElementManager');
        $form = $forms->get("FiltroTreinoExercicioForm", array());
            
        $where = "where (t.idTreinoGeral = '".$idTreinoGeral."' or '".$idTreinoGeral."' = '') and "
                . "(t.idExercicio = '".$idExercicio."' or '".$idExercicio."' = '')";
        $query = "select t from $this->entity t $where";
        
        $list = $this->getEm()->createQuery($query)->getResult();//faz o select no banco de dados
        $page = $this->params()->fromRoute('page');
        
        $paginator = new Paginator(new ArrayAdapter($list));//paginacao trazendo todos nosso resultado
        $paginator->setCurrentPageNumber($page)//seta a pagina atual que será paginada
                ->setDefaultItemCountPerPage(10); //quantidade de paginas que será feito a busca
        $view = new ViewModel(['data'=> $paginator, 'page' => $page, 'form' => $form]);//retorna para a pagina as paginas com a lista de paginas
       
        return $view;        
    }
}

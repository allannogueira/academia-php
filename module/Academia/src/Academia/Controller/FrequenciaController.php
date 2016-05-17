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

class FrequenciaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\FrequenciaForm';
        $this->controller = 'FrequenciaController';
        $this->route = 'frequencia';
        $this->service = 'Academia\Service\FrequenciaService';
        $this->entity = 'Academia\Entity\FrequenciaAluno';
        $this->listarAction = "frequenciasAction";//nome da chamada no webservice
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
}

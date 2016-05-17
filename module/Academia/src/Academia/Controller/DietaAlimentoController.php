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

class DietaAlimentoController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\DietaAlimentoForm';
        $this->controller = 'DietaAlimentoController';
        $this->route = 'dietaAlimento';
        $this->service = 'Academia\Service\DietaAlimentoService';
        $this->entity = 'Academia\Entity\DietaAlimento';
    }
    
    public function listarAction($where = "")
    {    
        $session = new \Zend\Session\Container();
        $academia = "";
        if($session['idAcademia'] != ""){
            $academia = "where dg.idAcademia = ".$session['idAcademia'];
        }
        
        $query = "select t from $this->entity t inner join t.idDietaGeral dg $academia";
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

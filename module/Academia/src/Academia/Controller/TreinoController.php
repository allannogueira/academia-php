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
    /*
    public function inserirAction(){
        echo "<pre>";
        var_dump($this);
        echo "</pre>";
        exit;
    }*/
    

    
   public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
        $dataInicioDe = $this->params()->fromPost("data_inicio_de");
        $dataInicioAte = $this->params()->fromPost("data_inicio_ate");
                
        $where = "where (t.nome like '%".$nome."%' or '".$nome."' = '') "
                . "and ((t.dataInicio between '".$dataInicioDe."' and '".$dataInicioAte."') or '".$dataInicioDe."' = '' or '".$dataInicioAte."' = '')";
        
        return parent::listarAction($where);
        
      
    }
}

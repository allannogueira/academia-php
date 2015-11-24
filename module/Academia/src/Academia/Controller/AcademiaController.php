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
use WS\Controller\ClienteController;

class AcademiaController extends AbstractController
{
    public function __construct()
    {
        $this->form = 'Academia\Form\AcademiaForm';
        $this->controller = 'AcademiaController';
        $this->route = 'academia';
        $this->service = 'Academia\Service\AcademiaService';
        $this->entity = 'Academia\Entity\Academia';
        $this->listarAction = "academiasAction";//nome da chamada no webservice
    }
    
    public function listarAction($where = ""){
        $nome = $this->params()->fromPost("nome");
        $usuario = $this->params()->fromPost("usuario");
        $dataCadastroDe = $this->params()->fromPost("data_cadastro_de");
        $dataCadastroAte = $this->params()->fromPost("data_cadastro_ate");
                
        $where = "where (t.nome like '%".$nome."%' or '".$nome."' = '') "
                . "and (t.usuario='".$usuario."' or '".$usuario."' = '')"
                . "and ((t.dataCadastro between '".$dataCadastroDe."' and '".$dataCadastroAte."') or '".$dataCadastroDe."' = '' or '".$dataCadastroAte."' = '')";
        return parent::listarAction($where);
    }
}

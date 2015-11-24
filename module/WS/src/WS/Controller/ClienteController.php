<?php

namespace WS\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\Client;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class ClienteController extends AbstractActionController
{
	protected $_WSDL_URI = "http://localhost/services";
	
	public function indexAction() {
		/*$localProduto = $this->_WSDL_URI . '/index/produtos?wsdl';//ClienteController chamara o IndexController através da rota /index
		$produto = new Client($localProduto);
		
		$localServico = $this->_WSDL_URI . '/index/servicos?wsdl';
		$servico = new Client($localServico);*/
                
                $localAcademia = $this->_WSDL_URI . '/index/academias?wsdl';
		$academia = new Client($localAcademia);
		
		return new ViewModel(array(
			//'produtos' => $produto->produtos(),
			//'servicos' => $servico->servicos(),
                        'academias' => $academia->academias(),
		));
	}
        
        
        
        public function academiasAction(){
          $local = $this->_WSDL_URI . '/index/academias?wsdl';
          $servico = new Client($local);
         // echo var_dump($servico);
          return $this->viewTerminal($servico,"academias");
        }
        
        
        public function alunosAction(){
          $local = $this->_WSDL_URI . '/index/alunos?wsdl';
          $servico = new Client($local);
         // echo var_dump($servico);
          return $this->viewTerminal($servico,"alunos");
        }
        
        function viewTerminal($cliente,$nomeFuncao){
            //return $cliente->$nomeFuncao();
            
           $result = new JsonModel(array(
                "retorno" => json_encode($cliente->$nomeFuncao())//deve retornar um array
            ));
            return $result;
        }
}
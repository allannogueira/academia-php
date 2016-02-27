<?php

namespace Academia\Controller;

use Base\Controller\AbstractController;
use Academia\Controller\FacebookController;
use Zend\View\Model\ViewModel;
use Zend\Http\Request;
use Zend\Http\Client;
use Zend\Stdlib\Parameters;

class IndexController extends AbstractController
{
    public function __construct()
    {
        
    }
    
    public function indexAction(){
       /* try {
            $this->getEm()->getConnection()->connect();
        } catch (\Exception $e) {
            // failed to connect
        }
        */
       // $db = \Zend_Db::factory('pdo_mysql',array('host'=> '192.185.176.178','username'=> 'ddc_allan','password'=> '96321924','dbname'=> 'ddc_academia'));
        //$link = mysqli_connect('192.185.176.178', 'ddc_allan', '96321924'); if (!$link) { die('Não foi possível conectar: ' . mysqli_error()); } echo 'Conexão bem sucedida'; mysqli_close($link);
//exit;
        $facebook = new FacebookController();
        $urlLogin = $facebook->getUrlLogin();
        return new ViewModel(array(
            'urlLogin' => $urlLogin
        ));
    }
}

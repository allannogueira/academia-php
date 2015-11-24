<?php
use Base\Controller\AbstractController;

        require_once("config/variaveis.php");
        require_once 'lib/nusoap.php';
        
        if(isset($_GET["ident"])){
            $id = $_GET["ident"];
        }else{
            $id="";
        }

	if($id !=""){	
                $cliente = new nusoap_client(IP_SERVER.'/webservice/server.php?wsdl');
                $resultado = $cliente->call('exemplo',array('id'=>$id));

                $obj = json_decode($resultado);

                echo var_dump($obj);
        }else{
                echo "nenhum resultado retornado";
        }
?>

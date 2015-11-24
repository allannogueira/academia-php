<?php   require_once("config/variaveis.php");

        require_once('lib/nusoap.php');
        $server = new nusoap_server();
        $server->configureWSDL('server.exemplo', IP_SERVER."/webservice");//local que esta o servidor exemplo 192.168.1.1/webservice
        $server->wsdl->schemaTargetNamespace = IP_SERVER."/webservice";

        $server->register('exemplo', 
                 array('id'=>'xsd:string'),
                 array('retorno'=>'xsd:string'),
                 IP_SERVER.'/webservice',
                 IP_SERVER.'/webservice/exemplo',
                 'rpc',
                 'encoded',
                'Apenas um exemplo utilizando o NuSOAP PHP.'
        );

        function exemplo($id){
                $conecta = mysqli_connect("127.0.0.1", "root", "root",DATABASE);

                $sql = "SELECT * FROM medidas";
                $result = mysqli_query($conecta,$sql);
                //while($consulta = mysql_fetch_array($result)) { //pega indice valor e nome do campo e valor
                while($consulta = mysqli_fetch_assoc($result)) { // pega apenas nome do campo e valor
                        $retorno = json_encode($consulta);
                }
                
                if ($retorno == "")
                {
                	$retorno = "{\"id\":\"vazio\"}";
                }
                return $retorno;
        }
        
        //function exemplo(){
           // $list = $this->getEm()->createQuery("select t from $this->entity t where t.id = $id")->getResult();
            
       // }
        
// para sobecrever se a variavel estiver em branco.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
// devolve para o clinte
$server->service($POST_DATA);
exit();

?>
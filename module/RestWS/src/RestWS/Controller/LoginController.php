<?php
namespace RestWS\Controller;
 
use Zend\Mvc\Controller\AbstractRestfulController;
 
use Album\Model\Album;
use Album\Form\AlbumForm;
use Album\Model\AlbumTable;
use Zend\View\Model\JsonModel;
 
class LoginController extends AbstractRestfulController
{
    /*
    public function getList()
    {
          return new JsonModel(array(
            'usuario' => array("parabens, vc chamou o metodo getList"),
        ));
    }
 
    public function get($id)
    {
         
         return new JsonModel(array(
            'academias' => array("id"=>$id),
        ));
         
       $qb = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager')->createQueryBuilder();
        $qb->select('a','e')
            ->from('Academia\Entity\Academia', 'a')
          //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
               ->leftJoin('a.endereco','e')
                ->where('a.id = '.$id);
        $array = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        return new JsonModel(array(
            'academias' => $array,
        ));
    }*/
    
    private function verificaLogin($usuario,$senha){
        $qb = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager')->createQueryBuilder();
        $qb->select('a')
            ->from('Academia\Entity\Academia', 'a')
            ->where("a.usuario = '".$usuario."' and a.senha = '".$senha."'");
            
        $retorno_array = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        
        return new JsonModel(array(
            'usuario' => array($retorno_array),
        ));
    }
    
    public function verificaLoginAction(){
        $usuario = $this->params()->fromPost("usuario");
        $senha = $this->params()->fromPost("senha");
        return $this->verificaLogin($usuario,$senha);
    }
}
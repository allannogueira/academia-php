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
    
    private function verificaLogin($email,$senha){
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
      /*  $qb = $em->createQueryBuilder();

  
        $qb->select('a.idAluno','l','fin','aca','e','ea')
            ->from('Academia\Entity\Aluno', 'a')
            ->innerJoin('Academia\Entity\Login','l',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN,'a.idLogin = l.idLogin')
            ->innerJoin('Academia\Entity\Endereco','e',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN,'a.idEndereco = e.idEndereco')
            ->innerJoin('Academia\Entity\Finalidade','fin',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN,'a.idFinalidade = fin.idFinalidade')
            ->innerJoin('Academia\Entity\Academia','aca',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN,'a.idAcademia = aca.idAcademia')
            ->innerJoin('Academia\Entity\Endereco','ea',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN,'aca.idEndereco = ea.idEndereco')
            ->where("l.email = '".$email."' and l.senha = '".$senha."'");
       //$retorno_array = $em->getRepository("Academia\Entity\Aluno")->findAll(); 
        $retorno_array = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
     */
        $productRepository = $em->getRepository('Academia\Entity\Aluno');
$products = $productRepository->findAll();
/*
foreach ($products as $product) {
    echo sprintf("-%s\n", $product->getNome());
}*/
exit;
        $retorno_array = array("teste"=>"teste");
        return new JsonModel(array(
            'usuario' => array($retorno_array),
        ));
    }
    
    public function verificaLoginAction(){
        $email = $this->params()->fromQuery("email");
        $senha = $this->params()->fromQuery("senha");
        if($email == "")
           $email = $this->params()->fromPost("email");
        
        if($senha == "")
           $senha = $this->params()->fromPost("senha");
        
        return $this->verificaLogin($email,$senha);
    }
}
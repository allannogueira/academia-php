<?php
namespace RestWS\Controller;
 
use Zend\Mvc\Controller\AbstractRestfulController;
 
use Album\Model\Album;
use Album\Form\AlbumForm;
use Album\Model\AlbumTable;
use Zend\View\Model\JsonModel;
 
class AlbumRestController extends AbstractRestfulController
{
    public function getList()
    {
          return new JsonModel(array(
            'getList' => array("parabens, vc chamou o metodo getList"),
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
    }
 
    public function create($data)
    {
           return new JsonModel(array(
            'create' => array("parabens, vc chamou o metodo CREATE"),
        ));
    }
 
    public function update($id, $data)
    {
         return new JsonModel(array(
            'update' => array("parabens, vc chamou o metodo UPDATE"),
        ));
    }
 
    public function delete($id)
    {
         return new JsonModel(array(
            'delete' => array("parabens, vc chamou o metodo DELETE"),
        ));
    }
    
    public function createAction(){
        return $this->create("teste");
    }
    
    public function updateAction(){
        return $this->update();
    }
    
    public function deleteAction($id){
        echo var_dump($id);
        return $this->delete($id);
    }
}
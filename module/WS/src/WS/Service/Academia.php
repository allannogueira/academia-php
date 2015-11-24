<?php

namespace WS\Service;
class Academia{
	
	protected $em;
        public function __construct($em) {
           $this->em = $em;
        }
        
        /**
	 * @return Array
	 */
	public function academias(Doctrine\ORM\EntityManager $em){
            //return array("nome"=>"cleber");
           // $lista = $this->em->createQuery("select t from Academia\Entity\Academia t")->getResult();
            /* $lista = $this->em->getRepository('Academia\Entity\Academia')->findAll();
             $lista = $this->em->createQuery("select t from Academia\Entity\Academia t "
                     . "inner join Academia\Entity\Endereco e on e.id = t.endereco_id"
                     . "")->getResult();*/
          //  $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');//->createQuery("select t from $this->entity t")->getResult();
           // $objAcademia = new AcademiaController();
           // $objAcademia->setEm($em);
           // $lista =   $objAcademia->listarJsonAction($em);
           // $lista = array($lista->getQuery());
            
            $qb = $this->em->createQueryBuilder();
 $qb->select('a','e')
     ->from('Academia\Entity\Academia', 'a')
   //  ->join('Academia\Entity\Endereco', 'e','e.id = a.endereco_id');
        ->leftJoin('a.endereco','e');

 $array = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
 
            return $array;
	}
}
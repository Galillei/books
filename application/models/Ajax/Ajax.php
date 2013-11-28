<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/10/13
 * Time: 1:41 PM
 */

class Application_Model_Ajax_Ajax {

    private $entityManager;
    public function __construct()
    {
        $this->entityManager = Zend_Registry::getInstance()->get('entitymanager');
    }
    public function searchAuthors($term)
    {
        $em = $this->entityManager;
        /*
         * @return Doctrine QueryBuileder
         */
        $qb = $em->createQueryBuilder();
        $q= $qb->select('u.idAuthor', 'u.name','u.surname','u.lastname')
           ->from('Authors', 'u')
           ->andWhere('u.name LIKE :name')
           ->orWhere('u.lastname LIKE :name')
           ->orWhere('u.surname LIKE :name')
           ->setParameter('name',$term.'%')
            ->getQuery();
         return $this->restractAuthors($q->getArrayResult());
    }
    //only for search name
    public function searchNameAuthors($term)
    {
        $em = $this->entityManager;
        /*
         * @return Doctrine QueryBuileder
         */
        $qb = $em->createQueryBuilder();
        $q= $qb->select('u.name')
            ->from('Authors', 'u')
            ->andWhere('u.name LIKE :name')
            ->setParameter('name',$term.'%')
            ->getQuery();
            $name=$q->getArrayResult();
        $qbb = $em->createQueryBuilder();
        $qq = $qbb->select('u.surname')
            ->from('Authors','u')
            ->andWhere('u.surname LIKE :name')
            ->setParameter('name',$term.'%')
            ->getQuery();
            $midlename = $qq->getArrayResult();
        $name = $this->restractNameAuthor($name);
        $midlename = $this->restractNameAuthor($midlename);
        $mergeName = array_unique(array_merge($name,$midlename));
        return $this->arrayToJson($mergeName);
    }
    public function searchLastNameAuthors($term)
    {
        $em = $this->entityManager;
        $qb = $em->createQueryBuilder();
        $q= $qb->select('u.lastname')
            ->from('Authors', 'u')
            ->andWhere('u.lastname LIKE :name')
            ->setParameter('name',$term.'%')
            ->getQuery();
        $name=$q->getArrayResult();
        return $this->arrayToJson($name);
    }
    //only for search
    private function restractAuthors($array)
    {
        function authorsName($v,$w)
        {
            $v.=' '.$w;
            return trim($v);
        }
        $name = [];
        $id = '';
        foreach($array as $authors)
        {
            $id = $authors['idAuthor'];
            unset($authors['idAuthor']);
            $author = array_reduce($authors,"authorsName");

            $name[] = array('label'=>$author,'value'=>$author,'value1'=>$id);
         }
        return $name;

    }

    private function restractNameAuthor($names)
    {
        $nameValues = [];
        foreach($names as $name) {
        $nameValues=array_values($name);
        }
        return $nameValues;
    }
    private function arrayToJson($names)
    {
        $newArray = [];
          foreach($names as $name)
        {
            if(is_array($name))
            {
            $a = array_values($name);
            foreach($a as $value){
        $newArray=array('label'=>$value);
            }
            }
            else{
             $newArray = array('label'=>$name);
            }
        }
        return array_unique($newArray);
    }
}

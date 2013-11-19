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
        $q= $qb->select('u.idAuthor', 'u.name','u.surname','u.midlename')
           ->from('Authors', 'u')
           ->andWhere('u.name LIKE :name')
           ->orWhere('u.midlename LIKE :name')
           ->orWhere('u.surname LIKE :name')
           ->setParameter('name',$term.'%')
            ->getQuery();
         return $this->restractAuthors($q->getArrayResult());
    }
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


} 

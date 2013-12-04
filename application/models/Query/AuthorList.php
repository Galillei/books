<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/3/13
 * Time: 9:59 AM
 */

class Application_Model_Query_AuthorList {
    private $entityManager;
    public function __construct()
    {
        $this->entityManager = Zend_Registry::getInstance()->get('entitymanager');
    }
    public function listAuthors()
    {
        $em = $this->entityManager;
        /*
         * @return Doctrine QueryBuileder
         */
        $qb = $em->createQueryBuilder();
        $q = $qb->select('u.idAuthor', 'u.name','u.surname','u.lastname','u.picturepath')
            ->from('Authors','u')
            ->getQuery();
        return $q->getResult();
    }

} 

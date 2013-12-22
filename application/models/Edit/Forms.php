<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/12/13
 * Time: 10:29 PM
 */

class Application_Model_Edit_Forms
{
    private $arrayWithId;
    private $entityManager;
    private $arrayWithData = array();

  public function __construct($arrayWithId)
  {
      $this->arrayWithId = $arrayWithId;
      $this->entityManager = Zend_Registry::getInstance()->get('entitymanager');

  }
    public function extractData()
    {
        $arrayWithId = $this->arrayWithId;
        foreach($arrayWithId as $id)
        {
            $this->arrayWithData[] = $this->getQuery($id);
        }
       return $this->arrayWithData;
    }

  private function getQuery($id)
  {
      $em = $this->entityManager;
      /*
       * @return Doctrine QueryBuileder
       */
      $qb = $em->createQueryBuilder();
      $q= $qb->select('u.idAuthor', 'u.name','u.surname','u.lastname','u.biography','u.picturepath')
          ->from('Authors', 'u')
          ->Where('u.idAuthor = :id')
          ->setParameter('id',$id)
          ->getQuery();
      return $q->getResult();
  }

} 

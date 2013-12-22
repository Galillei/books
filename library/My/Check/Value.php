<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/22/13
 * Time: 8:53 PM
 */

class My_Check_Value {
    protected $em;
    protected $name;
    protected $lastname;
    protected $surname;
    protected $entity='Authors';

    public function __construct($name,$surname=null,$lastname)
    {
      $this->em = Zend_Registry::getInstance()->get('entitymanager');
      $this->name = $name;
      $this->lastname = $lastname;
      $this->surname = $surname;
    }

    public function authenticate()
    {
        $em = $this->em;
        $qb = $em->createQueryBuilder();
        $q = $qb->select('i')
            ->from($this->entity,'i')
            ->andWhere('i.name='.'\''.$this->name.'\'')
            ->andWhere('i.surname='.'\''.$this->surname.'\'')
            ->andWhere('i.lastname='.'\''.$this->lastname.'\'');
        $qq = $q->getQuery();
        $result = $qq->getResult();
        if(count($result)>0)
        {
            return true;
        }
        return false;
    }

} 

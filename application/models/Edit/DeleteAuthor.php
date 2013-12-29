<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/28/13
 * Time: 11:09 AM
 */

class Application_Model_Edit_DeleteAuthor {
    protected $editAuthor;
    private $entityManager;
    public function __construct($arrayOfEditAuthors)
    {
        $this->editAuthor = $arrayOfEditAuthors;
        $this->entityManager = Zend_Registry::getInstance()->get('entitymanager');
    }
    public function deleteAuthor()
    {
        $em = $this->entityManager;
        $editAuthor = $this->editAuthor;
        $author = $em->getRepository('Authors')->find($editAuthor);
        $author->setVisible(0);
        $author->prePersist();
        $em->persist($author);
        $em->flush();
    }

} 

<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/28/13
 * Time: 8:19 AM
 */

class Application_Model_Edit_UpdateAuthors {

    protected $editAuthors;
    private $entityManager;
    public function __construct($arrayOfEditAuthors)
    {
        $this->editAuthors = $arrayOfEditAuthors;
        $this->entityManager = Zend_Registry::getInstance()->get('entitymanager');
    }
    public function updateAuthors()
    {
        $em = $this->entityManager;
        $editAuthors = $this->editAuthors;
        $arrayOfNameSubFormAndFileName = Zend_Registry::get('arrayOfSubFormName');
        $i = 0;
        foreach($editAuthors as $edit)
        {
            $author = $em->getRepository('Authors')->find($edit['idAuthor']);
            $author->setName($edit['name']);
            $author->setSurname($edit['surname']);
            $author->setLastname($edit['lastname']);
            $author->setBiography($edit['Biography']);
            if($edit['deletePhoto']==1)
            {
                $author->setPicturepath(null);
            }
            $author->setPicturepath($edit[$arrayOfNameSubFormAndFileName[$i][1]]);
            $author->prePersist();
            $em->persist($author);
            $em->flush();
        }


    }

} 

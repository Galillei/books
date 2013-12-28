<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/8/13
 * Time: 11:07 AM
 */

class Catalog_AdminItemController extends Zend_Controller_Action
{
    public function preDispatch()
    {
        $url = $this->getRequest()->getRequestUri();

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace('square.auth');
            $session->requestURL = $url;
            $this->redirect('/login');
        }
        else{
            $this->_helper->layout->setLayout('admin-css');
        }

    }
    public function indexAction()
    {
        $form = new My_Form_InsertBooks();
        $this->view->form = $form;
    }
    public function init()
    {
//
//       $this->view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
    }

    public function addauthorAction()
    {
        $form = new My_Form_AddAuthor();
        $this->view->form = $form;
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost())){
                $values = $form->getValues();
                $check = new My_Check_Value($values['name'],$values['surname'],$values['lastname'],'Authors');
                if($check->authenticate())
                {

                    $this->view->messages = 'The author was already exists';
                }
                else
                {
                    if(!$form->photo->receive())
                    {
                        $form->photo->setErrorMessages(array('Error'=>'This file can\'t be write'));
                        $this->view->form = $form;
                    }
                    else{
                    $insertAuthor = new Authors();
                    $insertAuthor->setName($values['name'])
                                ->setSurname($values['surname'])
                                ->setLastname($values['lastname'])
                                ->setBiography($values['biography'])
                                ->setPicturepath($values['photo']);
                    $em = Zend_Registry::get('entitymanager');
                    $em->persist($insertAuthor);
                    $em->flush();
                    $this->_helper->getHelper('FlashMessenger')->addMessage('The records will be insert');
                    $this->redirect('/admin/catalog/item/success');
                    }
                }
            }
        }
    }

    public function categoryAction()
    {
        $form = new My_Form_AddCategory();
        $this->view->form = $form;
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost())){
                $values = $form->getValues();
                if($form->checkNullParent->isChecked())
                {
                    $parentCategory = 0;
                }
                else{
                    $parentCategory = $values['CategoryID'];
                }
                $insertCategory = new Categories();
                $insertCategory->setName($values['category'])
                               ->setParentcategory($parentCategory);
                $em = Zend_Registry::get('entitymanager');
                $em->persist($insertCategory);
                $em->flush();
                $this->_helper->getHelper('FlashMessenger')->addMessage('The category will be insert');
                $this->redirect('/admin/catalog/item/success');
            }
        }
    }

    public function publisherAction()
    {
        $form = new My_Form_AddPublisher();
        $this->view->form = $form;
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost())){
                $values = $form->getValues();
                $insertPublisher = new Publishers();
                $insertPublisher->setName($values['id_publisher']);
                $insertPublisher->setDescription('description');
                $em = Zend_Registry::get('entitymanager');
                $em->persist($insertPublisher);
                $em->flush();
                $this->_helper->getHelper('FlashMessenger')->addMessage('The publisher will be insert');
                $this->redirect('/admin/catalog/item/success');
            }
        }
    }

    public function successAction()
    {
        if($this->_helper->getHelper('FlashMessenger')->getMessages())
        {
            $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
        }
        else
        {
            $this->redirect('/admin/catalog/item/index');
        }
    }
}

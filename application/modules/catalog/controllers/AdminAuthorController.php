<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/3/13
 * Time: 12:49 PM
 */

class Catalog_AdminAuthorController extends Zend_Controller_Action
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

   public function displayAllAuthorsAction()
   {
   }
   public function displayAuthorAction()
   {
       var_dump($this->getAllParams());
   }
   public function editAuthorsAction()
    {

        $array = $this->getParam('check');
        if($array===null)
        {
            $this->redirect('/admin/catalog/display/authors/');
        }
            $newArray = array_filter($array,'strlen');
            $forms = new Application_Model_Edit_Forms($newArray);
            $arrayOfForms = $forms->extractData();
            $formForEditAuthors = new My_Form_SubForms();
            $formForEditAuthors = $formForEditAuthors->getEditAllForms($arrayOfForms);
         if($this->getRequest()->isPost())
        {
            if($formForEditAuthors->isValid($this->getAllParams())){

        }
            else{
                $this->view->form=$formForEditAuthors;
            }
        }
        else{
            $this->view->form=$formForEditAuthors;
        }


    }


    public function updateAuthorsDateAction()
    {

        var_dump($this->getAllParams());
    }
} 

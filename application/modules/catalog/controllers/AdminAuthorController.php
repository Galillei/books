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

            $parentForm = new My_Form_SubForms();

            $newArray = array_filter($array,'strlen');
            $forms = new Application_Model_Edit_Forms($newArray);
            $arrayOfForms = $forms->extractData();
            $i = 0;
            foreach($arrayOfForms as $forms)
            {
                $form = new My_Form_EditAuthor();
                $form->populate($forms[0]);
                if(isset($forms[0]['picturepath'])){
                    $form->getFileElement('subForm'.$i,$forms[0]['picturepath'],'nameElement'.$i);
                }
                else{
                    $form->getFileElement('subForm'.$i,$forms[0]['picturepath'],'nameElement'.$i);
                }
//                $form->setElementsBelongTo($i);
                $parentForm->addSubForm($form,$i+1);
                $i++;
            }
            $parentForm->addSubmit();
        if($this->getRequest()->isPost())
        {
            if($parentForm->isValid($this->getAllParams())){
        }
            else{
                $this->view->form = $parentForm;
            }
        }
        else{
            $this->view->form =  $parentForm;
        }


    }


    public function updateAuthorsDateAction()
    {

        var_dump($this->getAllParams());
    }
} 

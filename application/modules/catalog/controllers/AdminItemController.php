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
            $this->_helper->layout->setLayout('admin');
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

} 

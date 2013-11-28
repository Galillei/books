<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/8/13
 * Time: 11:28 PM
 */

class Catalog_AdminAjaxController extends Zend_Controller_Action
{
    static protected $arr = array();
    public function preDispatch()
    {
//        if (!$this->getRequest()->isXmlHttpRequest()) {
//            $this->getResponse()->setHttpResponseCode(404);
//        }
        $url = $this->getRequest()->getRequestUri();

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace('square.auth');
            $session->requestURL = $url;
            $this->redirect('/login');
        }
        else{
            header('404');
        }

    }

    public function authorsAction()
       {
           $authors = new Application_Model_Ajax_Ajax();
           $search = $this->_getParam('term');
           $author = $authors->searchAuthors($search);
           $this->_helper->json($author);
       }
    public function nameauthorAction()
    {
        $authors = new Application_Model_Ajax_Ajax();
        $search = $this->_getParam('term');
        $author = $authors->searchNameAuthors($search);
        $this->_helper->json($author);
    }
    public function lastnameauthorAction()
    {
        $authors = new Application_Model_Ajax_Ajax();
        $search = $this->_getParam('term');
        $author = $authors->searchLastNameAuthors($search);
        $this->_helper->json($author);
    }
} 

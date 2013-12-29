<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        {
            $form = new My_Form_Login();
            $this->view->form = $form;
// check for valid input
// authenticate using adapter
// persist user record to session
// redirect to original request URL if present
            if ($this->getRequest()->isPost()) {
                if ($form->isValid($this->getRequest()->getPost())) {
                    $values = $form->getValues();
                    $adapter = new My_Auth_Doctrine(
                        $values['username'], $values['password']
                    );
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($adapter);
                    if ($result->isValid()) {
                        $session = new Zend_Session_Namespace('square.auth');
                        $session->user = $adapter->getResultArray('Password');
                        if (isset($session->requestURL)) {
                            $url = $session->requestURL;
                            unset($session->requestURL);
                            $this->redirect($url);
                        } else {
                            $this->_helper->getHelper('FlashMessenger')
                                ->addMessage('You were successfully logged in.');
                            $this->redirect('/admin/catalog/display/authors/');
                        }
                    } else {
                        $this->view->message =
                            'You could not be logged in. Please try again.';
                    }
                }
            }
        }
    }
    public function successAction()
    {
        if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
            $this->view->messages = $this->_helper
                ->getHelper('FlashMessenger')
                ->getMessages();
        } else {
//            $this->redirect('/');
        }
    }


    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        $this->redirect('/login');
    }
}


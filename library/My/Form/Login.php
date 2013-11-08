<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/2/13
 * Time: 12:16 PM
 */

class My_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setAction('login')
            ->setMethod('post');
//        создаём текстовое поле для ввода имени
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username:')
            ->setOptions(array('size'=>'30'))
            ->setRequired(true)
            ->addValidator('Alnum')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
//        создаём текстовое поле для ввода пароля
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
            ->setOptions(array('size'=>'30'))
            ->setRequired(true)
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
//        создаём кнопку отправки
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Log in')
            ->setOptions(array('class'=>'submit'));
        $this->addElement($username)
            ->addElement($password)
            ->addElement($submit);
    }
} 

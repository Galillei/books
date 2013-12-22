<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/21/13
 * Time: 7:44 AM
 */

class My_Form_SubForms extends Zend_Form{
    public function init(){
$this->setAction('/admin/catalog/update/authors/')
->setEnctype('multipart/form-data')
->setMethod('post');
    }
    public function addSubmit()
    {
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(array('class'=>'submit','name'=>'Enter'));
        $submit->setDecorators(array(
            'ViewHelper',
            'Errors',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));
        $this->addElement($submit);
    }

} 

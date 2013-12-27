<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/21/13
 * Time: 7:44 AM
 */

class My_Form_SubForms extends Zend_Form{
    public function init(){
$this->setAction('')
->setEnctype('enctype', 'multipart/form-data')
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
    public function isValid($data)
    {
        return parent::isValid($data);
    }
    public function isSubFormValid($name = null, array $data = null)
    {
        if (is_null($name)) {
            $subForms = $this->getSubForms();
        } else {
            $subForms = array($this->getSubForm($name));
        }

        foreach ($subForms as $subForm) {
            if ($subForm->isValid($data)) {
                return true;
            }
        }

        return false;
    }

} 

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
    public function addIndexI($i)
    {

        $id = new Zend_Form_Element_Hidden('idIndex');
//        $id->setBelongsTo('index');
        $id->setValue($i);
        $this->addElement($id);
    }
    public function getEditAllForms(array $arrayOfForms)
    {
        $registry = Zend_Registry::getInstance();
        $i = 0;
        $arrayofI = [];
        $arrayOfNameSubFormElement = [];
        $nameOfSubForm = 'subform';
        $nameOfFile = 'nameElement';
        foreach($arrayOfForms as $forms)
        {
            $form = new My_Form_EditAuthor();
            $form->populate($forms[0]);
            $nameOfSubFormElement = $nameOfSubForm.$i;
            $nameOfFileElement = $nameOfFile.$i;
            if(isset($forms[0]['picturepath'])){
                $form->getFileElement($nameOfSubFormElement,$forms[0]['picturepath'],$nameOfFileElement);
            }
            else{
                $form->getFileElement($nameOfSubFormElement.$i,$forms[0]['picturepath'],$nameOfFileElement);
            }
//                $form->setElementsBelongTo($i);
            $this->addSubForm($form,$i+1);
            //for use name of subform, remember it in cash
            $arrayOfSubFormName[]=array($i+1,$nameOfFileElement);
            $i++;
        }

        $registry->arrayOfSubFormName = $arrayOfSubFormName;
//        $this->addIndexI($i);
        $this->addSubmit();
        return $this;
    }

} 

<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/22/13
 * Time: 8:07 PM
 */

class My_Form_AddAuthor extends Zend_Form
{
    public function init()
    {
        $this->setAction('')
            ->setMethod('post');
        $name = new ZendX_JQuery_Form_Element_AutoComplete('name');
        $name->setLabel('Name:');
        $name->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/name', 'minLength'=>'3'))
            ->setOptions(array('size'=>36))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
//        $name = new Zend_Form_Element_Text('name');
//        $name->setLabel('Name:')
//            ->setOptions(array('size'=>'36'))
//            ->setRequired('true')
//            ->addFilter('HtmlEntities')
//            ->addFilter('StringTrim');

        $surname = new ZendX_JQuery_Form_Element_AutoComplete('surname');
        $surname->setLabel('Surname:');
        $surname->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/name', 'minLength'=>'3'))
            ->setOptions(array('size'=>36))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');

        $lastname = new ZendX_JQuery_Form_Element_AutoComplete('lastname');
        $lastname->setLabel('Last name:');
        $lastname->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/lastname', 'minLength'=>'3'))
            ->setOptions(array('size'=>36))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $picture = new Zend_Form_Element_File('pictures/authors/');
        $picture->setLabel('Pictures')
                ->setDestination(APPLICATION_PATH.'/../'.'public/pictures/authors');
        $picture->addValidator('IsImage')
                ->addValidator('Count',true,1)
                ->addValidator(new My_Validator_CheckNameFile())
                ->addValidator('Size',true,102400);
        $biography = new Zend_Form_Element_Textarea('biography');
        $biography->setLabel('Biography');
        $biography->setOptions(array('rows'=>'10','cols'=>'40'))
                  ->setRequired('true')
                  ->addFilter('HtmlEntities')
                  ->addFilter('StringTrim');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enter:')
            ->setOrder(100)
            ->setOptions(array('class'=>'submit'));
        $this->addElement($name);
        $this->addElement($surname);
        $this->addElement($lastname);
        $this->addElement($picture,'photo');
        $this->addElement($biography);
        $this->addElement($submit);

    }
} 

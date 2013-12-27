<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/22/13
 * Time: 8:07 PM
 */

class My_Form_AddAuthor extends Zend_Form
{
    private $config;

    /**
     * @param \Zend_Config_Ini $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return \Zend_Config_Ini
     */
    public function getConfig()
    {
        return $this->config;
    }
    public $elementDecorators = array(
        'ViewHelper',
        'Errors',
        'HtmlTag',
        'Label'
    );
    public function init()
    {
        $this->setConfig(new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini','production'));
        $this->setAction('')
            ->setMethod('post');
        $name = new ZendX_JQuery_Form_Element_AutoComplete('name');
        $name->setLabel('Name:');
        $name->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/name', 'minLength'=>'3'))
            ->setOptions(array('size'=>36))
            ->setRequired('true')
            ->addValidator('Alpha')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');

        $surname = new ZendX_JQuery_Form_Element_AutoComplete('surname');
        $surname->setLabel('Surname:');
        $surname->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/name', 'minLength'=>'3'))
            ->setOptions(array('size'=>36))
            ->setRequired('true')
            ->addValidator('Alpha')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');

        $lastname = new ZendX_JQuery_Form_Element_AutoComplete('lastname');
        $lastname->setLabel('Last name:');
        $lastname->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors/lastname', 'minLength'=>'3'))
            ->setRequired('true')
            ->addValidator('Alpha')
            ->setOptions(array('size'=>36))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');

        $picture = new Zend_Form_Element_File('pictures/authors/');
        $picture->setLabel('Pictures')
                ->setDestination($this->getConfig()->public->dir->images->authors);
        $picture->addValidator('IsImage')
                ->addValidator('Count',true,1)
                ->addValidator(new My_Validator_CheckNameFile($picture->getFileName()))
                ->addValidator('Size',true,102400)
                ->addValidator(new Zend_Validate_File_ImageSize(array('minwidth'=>100,'maxwidth'=>300,'minheight'=>100,'maxheight'=>300)));
        $biography = new Zend_Form_Element_Textarea('biography');
        $biography->setLabel('Biography');
        $biography->setOptions(array('rows'=>'10','cols'=>'50'))
                  ->setRequired('true')
                  ->addFilter('HtmlEntities')
                  ->addFilter('StringTrim')
                  ->getDecorator('Errors')->setOption('class','notification-input ni-error');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(array('class'=>'submit','name'=>'Enter'));
        $addAuthor = new Zend_Form_Element_Submit('submit-button');
        $addAuthor->setOptions(array('class'=>'submit'))
                    ->setLabel("Добавить ещё автора");
        $addAuthor->setDecorators(array(
            'ViewHelper',
            'Errors',
            array('HtmlTag', array('tag'=>'dd','class'=>'inlines_element'))
        ));
        $this->addElement($name);
        $this->addElement($surname);
        $this->addElement($lastname);
        $this->addElement($picture,'photo');
        $this->addElement($biography);
        $this->addElement($submit);
        $this->addElement($addAuthor);

    }
} 

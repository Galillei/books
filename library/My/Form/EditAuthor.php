<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/12/13
 * Time: 10:40 PM
 */

class My_Form_EditAuthor extends Zend_Form_SubForm{

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
    public function init()
    {
        $this->setConfig(new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini','production'));
        $this->addPrefixPath('My_Decorators_Form','My/Decorators/Form/','decorator');
        $this->setElementsBelongTo('formsAuthors');
        $id = new Zend_Form_Element_Hidden('idAuthor');
        $id->setBelongsTo('ids');
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name:');
        $name->setOptions(array('size'=>36))
            ->setRequired('true')
            ->setBelongsTo('names')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');
        $name->setDecorators(array(
            'ViewHelper',
            'Errors',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));


        $surname = new Zend_Form_Element_Text('surname');
        $surname->setLabel('Surname:');
        $surname->setOptions(array('size'=>36))
            ->setRequired('true')
            ->setBelongsTo('surnames')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');
        $surname->setDecorators(array(
            'ViewHelper',
            'Errors',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $lastname = new Zend_Form_Element_Text('lastname');
        $lastname->setLabel('Last name:');
        $lastname->setRequired('true')
            ->setBelongsTo('lastnames')
            ->setOptions(array('size'=>36))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');
        $lastname->setDecorators(array(
            'ViewHelper',
            'Errors',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $picture = new Zend_Form_Element_File('picturepath');
        $picture->setLabel('Выберите картинку для загрузки:')
            ->setBelongsTo('pictures')
            ->setDestination($this->getConfig()->public->dir->images->authors);
        $picture->addValidator('IsImage')
            ->addValidator('Count',true,1)
            ->addValidator(new My_Validator_CheckNameFile($picture->getFileName()))
            ->addValidator('Size',true,102400)
            ->addValidator(new Zend_Validate_File_ImageSize(array('minwidth'=>100,'maxwidth'=>300,'minheight'=>100,'maxheight'=>300)));
        $picture->setOptions(array('nameOfPicture'=>'picture/pictyre/picture'));
        $picture->setDecorators(array(
            'File',
            'Files',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element')),
            'Description',
            array('Errors',array('class','notification-input ni-error'))
            ));
        $checkDeletePhoto = new Zend_Form_Element_Checkbox('deletePhoto');
        $checkDeletePhoto->setLabel('Удалить фото из базы?')
            ->setBelongsTo('checkDeletePhotos');
        $checkDeletePhoto->setDecorators(array(
            'ViewHelper',
            'Errors',
            'CheckBoxDeletePicture',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));
        $biography = new Zend_Form_Element_Textarea('biography');
        $biography->setLabel('Biography');
        $biography->setOptions(array('rows'=>'10','cols'=>'50'))
            ->setRequired('true')
            ->addFilter('HtmlEntities')
            ->setBelongsTo('biographyies')
            ->addFilter('StringTrim')
            ->getDecorator('Errors')->setOption('class','notification-input ni-error');
        $biography->setDecorators(array(
            'ViewHelper',
            'Errors',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $this->addElement($id);
        $this->addElement($name);
        $this->addElement($surname);
        $this->addElement($lastname);
        $this->addElement($biography);
        $this->addElement($picture,'picturepath');
        $this->addElement($checkDeletePhoto);
    }

} 

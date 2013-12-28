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
        $this->setName('authors');
        $id = new Zend_Form_Element_Hidden('idAuthor');
        $id->setBelongsTo('ids');
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name:');
        $name->setOptions(array('size'=>36))
            ->setRequired('true')
//            ->setBelongsTo('names')
            ->addValidator('Alpha')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $name->setDecorators(array(
            'ViewHelper',
            array('Errors',array('class'=>'notification-input ni-error')),
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));


        $surname = new Zend_Form_Element_Text('surname');
        $surname->setLabel('Surname:');
        $surname->setOptions(array('size'=>36))
            ->setRequired('true')
//            ->setBelongsTo('surnames')
            ->addValidator('Alpha')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');

        $surname->setDecorators(array(
            'ViewHelper',
            array('Errors',array('class'=>'notification-input ni-error')),
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $lastname = new Zend_Form_Element_Text('lastname');
        $lastname->setLabel('Last name:');
        $lastname->setRequired('true')
//            ->setBelongsTo('lastnames')
            ->setOptions(array('size'=>36))
            ->addValidator('Alpha')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');

        $lastname->setDecorators(array(
            'ViewHelper',
            array('Errors',array('class'=>'notification-input ni-error')),
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $picture = new Zend_Form_Element_File('picture');
        $picture->setLabel('Pictures')
            ->setDestination($this->getConfig()->public->dir->images->authors);
        $picture->addValidator('IsImage')
            ->addValidator('Count',true,1)
            ->addValidator(new My_Validator_CheckNameFile($picture->getFileName()))
            ->addValidator('Size',true,102400)
            ->addValidator(new Zend_Validate_File_ImageSize(array('minwidth'=>100,'maxwidth'=>300,'minheight'=>100,'maxheight'=>300)));
        $picture->setDecorators(array(
            'File',
            'Files',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element')),
            'Description',
            array('Errors',array('class','notification-input ni-error'))
            ));
        $checkDeletePhoto = new Zend_Form_Element_Checkbox('deletePhoto');
        $checkDeletePhoto->setLabel('Удалить фото из базы?');
//            ->setBelongsTo('checkDeletePhotos');
        $checkDeletePhoto->setDecorators(array(
            'ViewHelper',
            array('Errors',array('class'=>'notification-input ni-error')),
            'CheckBoxDeletePicture',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));
        $biography = new Zend_Form_Element_Textarea('biography');
        $biography->setLabel('Biography');
        $biography->setOptions(array('rows'=>'10','cols'=>'50'))
            ->addFilter('HtmlEntities')
//            ->setBelongsTo('biographyies')
            ->addFilter('StringTrim');
        $biography->setDecorators(array(
            'ViewHelper',
            array('Errors',array('class'=>'notification-input ni-error')),
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element'))
        ));

        $this->addElement($id);
        $this->addElement($name);
        $this->addElement($surname);
        $this->addElement($lastname);
        $this->addElement($biography);
//        $this->addElement($picture,'picturepath');
        $this->addElement($checkDeletePhoto);
    }
    public function getFileElement($name,$ids,$nameElement)
    {
        $picture = new Zend_Form_Element_File($name);
        $picture->setLabel('Pictures')
            ->setDestination($this->getConfig()->public->dir->images->authors)
            ->setOptions(array('nameOfPicture'=>$ids,'id'=>'id'.$name));
        $picture->addValidator('IsImage')
            ->addValidator('Count',true,1)
//            ->addValidator(new My_Validator_CheckNameFile($picture->getFileName()))
            ->addValidator('Size',true,102400)
            ->addValidator(new Zend_Validate_File_ImageSize(array('minwidth'=>100,'maxwidth'=>300,'minheight'=>100,'maxheight'=>300)));
        $picture->setDecorators(array(
            'File',
            array('Errors',array('class'=>'notification-input ni-error')),
            'Files',
            'Label',
            array('HtmlTag', array('tag'=>'div','class'=>'inlines_element')),
            'Description'
        ));
        $this->addElement($picture,$nameElement);
    }

} 

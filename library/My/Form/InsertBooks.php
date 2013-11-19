<?php

class My_Form_InsertBooks extends Zend_Form
{
    private $em;
    public function init()
    {
        $this->em = Zend_Registry::getInstance()->get('entitymanager');
        $this->setAction('')
            ->setMethod('post');
//        category
        $category = new Zend_Form_Element_Select('CategoryID');
        $category->setLabel('Category:')
            ->setRequired(true)
            ->addValidator('Int')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->addFilter('StringToUpper');
        foreach($this->getCategory() as $c)
        {
            $category->addMultiOption($c['idCategory'],$c['name']);
        }
        $name = new Zend_Form_Element_Textarea('Name');
        $name->setLabel('Name:')
            ->setOptions(array('rows'=>'3','cols'=>'30'))
            ->setRequired('true')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $emt = new ZendX_JQuery_Form_Element_AutoComplete('ac');
        $emt->setLabel('Autocomplete:');
        $emt->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors'))
            ->setOptions(array('size'=>26))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $idColumns = new Zend_Form_Element_Hidden('id_columns');
        $idColumns->addFilter('Alnum');
        $publisher = new Zend_Form_Element_Select('id_publisher');
        $publisher->setLabel('Publisher:')
             ->setRequired(true)
             ->addFilter('HtmlEntities')
             ->addFilter('StringTrim')
             ->addFilter('StringToUpper');
        foreach($this->getPublisher() as $c)
        {
            $publisher->addMultiOption($c['idPublisher'],$c['name']);
        }
        $isbn = new Zend_Form_Element_Text('isbn');
        $isbn->setLabel('ISBN:')
            ->setOptions(array('size'=>26))
            ->setRequired('true')
            ->addValidator('Isbn')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $picture = new Zend_Form_Element_File('pictures/books');
        $picture->setLabel('Pictures');
        $picture->addValidator('IsImageSize');


        $this->addElement($category);
        $this->addElement($name);
        $this->addElement($emt);
        $this->addElement($idColumns);
        $this->addElement($publisher);
        $this->addElement($isbn);
        $this->addElement($picture);

    }


    private function getCategory()
    {
        $em = $this->em;
        $q = $em->createQuery("select u from Categories u")->getArrayResult();
        return $q;
    }

    private function getPublisher()
    {
        $em = $this->em;
        $q = $em->createQuery("select u from Publishers u")->getArrayResult();
        return $q;
    }

} 

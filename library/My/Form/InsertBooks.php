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
        $addCategory = new Zend_Form_Element_Button(array('name'=>'addCategory','id'=>'addCategory','label'=>'Add Category'));
        $name = new Zend_Form_Element_Textarea('Name');
        $name->setLabel('Name:')
            ->setOptions(array('rows'=>'3','cols'=>'30'))
            ->setRequired('true')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $emt = new ZendX_JQuery_Form_Element_AutoComplete('ac');
        $emt->setLabel('Author:');
        $emt->setJQueryParams(array('source'=>'/admin/catalog/ajax/authors', 'minLength'=>'3'))
            ->setOptions(array('size'=>26))
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $addAuthors = new Zend_Form_Element_Button(array('name'=>'add','id'=>'addAuthors','label'=>'Add author'));
        $addAuthors->setName('add-Author');
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
        $addPublisher = new Zend_Form_Element_Button(array('name'=>'addPublisher','id'=>'addPublisher','label'=>'Add Publisher'));
        $isbn = new Zend_Form_Element_Text('isbn');
        $isbn->setLabel('ISBN:')
            ->setOptions(array('size'=>26))
            ->setRequired('true')
            ->addValidator('Isbn')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $picture = new Zend_Form_Element_File('pictures/books');
        $picture->setLabel('Pictures');
        $picture->addValidator('IsImage');
        $synopsis = new Zend_Form_Element_Text('synopsis');
        $synopsis->setLabel('Synopsis:')
            ->setOptions(array('size'=>26))
            ->setRequired('true')
            ->addValidator('Alnum')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $pagesCount = new Zend_Form_Element_Text('pageCount');
        $pagesCount->setLabel('Count of pages:')
            ->setOptions(array('size'=>26))
            ->setRequired('true')
            ->addValidator('Int')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $year = new Zend_Form_Element_Text('year');
        $year->setLabel('Publication date')
            ->setOptions(array('size'=>26))
            ->addValidator('Digits')
            ->addValidator('StringLength')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $datePicker = new ZendX_JQuery_Form_Element_DatePicker('date');
        $datePicker->setLabel('Date:')
            ->setJQueryParams(array('dateFormat'=>'dd-mm-yy'))
            ->setOptions(array('size'=>26))
            ->addValidator('Date')
            ->setRequired(true);
        $price = new Zend_Form_Element_Text('price');
        $price->setLabel('Price:')
            ->setOptions(array('size'=>26))
            ->addValidator('Int')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $countBooks = new Zend_Form_Element_Text('countBooks');
        $countBooks->setLabel('Count of Books')
            ->setOptions(array('size'=>26))
            ->setValue(0)
            ->addValidator('Int')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $this->addElement($category);
        $this->addElement($addCategory);
        $this->addElement($name);
        $this->addElement($emt);
        $this->addElement($idColumns);
        $this->addElement($addAuthors);
        $this->addElement($publisher);
        $this->addElement($addPublisher);
        $this->addElement($isbn);
        $this->addElement($picture);
        $this->addElement($synopsis);
        $this->addElement($pagesCount);
        $this->addElement($year);
        $this->addElement($datePicker);
        $this->addElement($price);
        $this->addElement($countBooks);


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

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
        $this->addElement($category);
        $this->addElement($name);

    }

    private function getCategory()
    {
        $em = $this->em;
        $q = $em->createQuery("select u from Categories u")->getArrayResult();
        return $q;
    }
} 

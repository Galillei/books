<?php
class My_Form_AddCategory extends Zend_Form
{
    private $em;
    public function init()
    {
        $this->em = Zend_Registry::getInstance()->get('entitymanager');
        $this->setAction('')
            ->setMethod('post');
        $category = new Zend_Form_Element_Text('category');
        $category->setLabel('Category:')
            ->setOptions(array('size'=>26))
            ->setRequired('true')
            ->addValidator('Alnum')
            ->addFilter('StringTrim')
            ->addFilter('HtmlEntities');
        $checkNullParent = new Zend_Form_Element_Checkbox('checkNullParent');
        $checkNullParent->setLabel('Category don\'t have parent:');
        $parentcategory = new Zend_Form_Element_Select('CategoryID');
        $parentcategory->setLabel('Parent Category:')
            ->setRequired(true)
            ->addValidator('Int')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim')
            ->addFilter('StringToUpper');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enter')
            ->setOrder(100)
            ->setOptions(array('class'=>'submit'));
        foreach($this->getCategory() as $c)
        {
            $parentcategory->addMultiOption($c['idCategory'],$c['name']);
        }

        $this->addElement($category);
        $this->addElement($parentcategory);
        $this->addElement($checkNullParent,'checkNullParent');
        $this->addElement($submit);

    }

    private function getCategory()
    {
        $em = $this->em;
        $q = $em->createQuery("select u from Categories u")->getArrayResult();
        return $q;
    }

} 

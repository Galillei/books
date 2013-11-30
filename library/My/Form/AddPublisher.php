<?php
class My_Form_AddPublisher extends Zend_Form
{
    public function init()
    {
        $publisher = new Zend_Form_Element_Text('id_publisher');
        $publisher->setLabel('Publisher:')
            ->setRequired(true)
            ->addFilter('HtmlEntities')
            ->setOptions(array('size'=>26))
            ->addFilter('StringTrim')
            ->addFilter('StringToUpper');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enter')
            ->setOrder(100)
            ->setOptions(array('class'=>'submit'));
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Description');
        $description->setOptions(array('rows'=>'10','cols'=>'30'))
            ->setRequired('true')
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        $this->addElement($publisher)
            ->addElement($submit)
            ->addElement($description);
    }
} 

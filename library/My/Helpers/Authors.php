<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/29/13
 * Time: 11:31 AM
 */

class My_View_Helper_Authors extends Zend_View_Helper_Abstract
{
    protected $listOfAuthors;
    use My_Traits_TableRows;
    public function __construct()
    {
        $authors = new Application_Model_Query_AuthorList();
        $this->listOfAuthors = $authors->listAuthors();
    }
    private function createForms()
    {
        $form = new Zend_Form('form');
        $form->setMethod('post');
        $form->setAction('/admin/catalog/edit/authors/');
        $form->setOptions(array('id'=>'check_form'));
        $lenght = count($this->listOfAuthors);
        $authors = $this->listOfAuthors;
        $i = 0;
        while($i<$lenght)
        {
            $form->addElement('checkbox','check_'.$i,array('class'=>'all_checked','id'=>'checkbox_'.$i,'value'=>$authors[$i]['idAuthor'],'belongsTo'=>'check','UncheckedValue'=>null,'decorators'=>array('ViewHelper')));
            $i++;
        }
        $form->setDecorators(array(array('ViewScript',array('viewScript'=>'_authors.phtml','class'=>'form element','data'=>$this->listOfAuthors,'tableRows'=>$this->rowsOfAuthorsTable,
            'view'=>$this->view,'check'=>'check_'))));
        return $form;
    }

    public function authors(){
                return $this->createForms();
    }
} 

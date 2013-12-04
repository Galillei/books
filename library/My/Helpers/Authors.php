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
    public function authors(){
        $listOfAuthors = $this->listOfAuthors;
        $name = $this->rowsOfAuthorsTable;

        $number = 1;
        $i = 0;
        $checkBox1 = new Zend_Form_Element_Checkbox('qwerty');
        $checkBox1->setOptions(array('class'=>"all_checked"));
        $checkBox1->setDecorators(array('ViewHelper'));
        $checkBox_id =$checkBox1;
        $checkBox_id->setOptions(array('id'=>'all_check'));
        $authorTable = '<div id="checkbox_img">'.$checkBox_id.
            '<a href="'.$this->view->url(array('id'=>"all"),'admin-catalog-display-author-id').'"><img src="/images/pencil.gif"  width="16" height="16" alt="edit" /></a>'.
            '<a href="'.$this->view->url(array('id'=>"all"),'admin-catalog-display-author-id').'"><img src="/images/bin.gif"  width="16" height="16" alt="delete" /></a></div>';
        foreach($listOfAuthors as $authors)
        {
          $authorTable .='<tr><td class="align-center">'.$number++.'</td>';
          $authorTable .='<td><a href="'.$this->view->url(array('id'=>$authors[$name[$i]]),'admin-catalog-display-author-id').'">'.$authors[$name[$i+1]].'</td>';
          $authorTable .='<td>'.$authors[$name[$i+2]].'</td>';
          $authorTable .='<td>'.$authors[$name[$i+3]].'</td>';
          $authorTable.='<td>'.$checkBox1.'
            <a href="'.$this->view->url(array('id'=>$authors[$name[$i]]),'admin-catalog-display-author-id').'">'.'<img src="/images/pencil.gif"  width="16" height="16" alt="edit" /></a>'.
            '<a href="'.$this->view->url(array('id'=>$authors[$name[$i]]),'admin-catalog-display-author-id').'">'.'<img src="/images/bin.gif"  width="16" height="16" alt="delete" /></a></td>';
          $authorTable.= '</tr>';
        }
        return $authorTable;
    }
} 

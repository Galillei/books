<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/15/13
 * Time: 1:48 PM
 */

class My_View_Helper_EditAuthors extends Zend_View_Helper_Abstract
{
    private $arrayOfForms;
    private $editForm;
    public function __construct()
    {

    }
    public function editAuthors($newArray)
    {
        $forms = new Application_Model_Edit_Forms($newArray);
        $parentForm = new My_Form_SubForms();
        $this->arrayOfForms = $forms->extractData();
        $this->editForm = new My_Form_EditAuthor();
        $array = [];
        $i = 0;
          foreach($this->arrayOfForms as $forms)
          {
              $form = new My_Form_EditAuthor();
              $form->populate($forms[0]);
              if(isset($forms[0]['picturepath'])){
              $form->getElement('picturepath')->setOptions(array('nameOfPicture'=>$forms[0]['picturepath']));
              }
              else{
                  $form->getElement('picturepath')->setOptions(array('nameOfPicture'=>'Фото не загружено'));
              }
              $i++;
              $form->setElementsBelongTo($i);
              $array[] = $form;

          }

        $parentForm->addSubForms($array);
        $parentForm->addSubmit();
        return $parentForm;
    }
}

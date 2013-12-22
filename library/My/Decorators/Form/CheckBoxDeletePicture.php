<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/19/13
 * Time: 9:53 PM
 */
class My_Decorators_Form_CheckBoxDeletePicture extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        $element = $this->getElement();
        $currentPicture = $element->getLabel();
        $separator =  $this->getSeparator();
        $placement =  $this->getPlacement();
        switch ($placement) {
            case 'APPEND':
                // добавляем новый контент после  старого, используя разделитель
                return   $separator . $currentPicture . $content;
            case  'PREPEND':
                // добавляем новый контент перед  старым, используя разделитель
                return  $currentPicture . $separator . $content;
            default:
                //   заменяем старый контент на новый
                return $content;
//        var_dump($element->getDescription());
        }
    }

}


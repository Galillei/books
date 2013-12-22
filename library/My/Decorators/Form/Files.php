<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 12/17/13
 * Time: 10:25 PM
 */

class My_Decorators_Form_Files extends Zend_Form_Decorator_Abstract{
    public function render($content)
    {
        $element = $this->getElement();
        $currentPicture = '<div id=\'currentPicture\'>Текущее фото: '.$element->nameOfPicture;
        $separator =  $this->getSeparator();
        $placement =  $this->getPlacement();


        switch ($placement) {
            case 'APPEND':
                // добавляем новый контент после  старого, используя разделитель
                return  $content . $separator . $currentPicture . '</div>';
            case  'PREPEND':
                // добавляем новый контент перед  старым, используя разделитель
                return  $currentPicture . $separator . $content . '</div>';
            default:
                //   заменяем старый контент на новый
            return $content;
//        var_dump($element->getDescription());
    }
    }

} 

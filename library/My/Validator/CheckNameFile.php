<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 11/28/13
 * Time: 4:29 PM
 */

class My_Validator_CheckNameFile extends Zend_Validate_Abstract
{
    const CHECKNAMEFILE = 'checknamefile';
    protected $_messageTemplates = array(
        self::CHECKNAMEFILE=>" This directory has file with name '%value%', please rename your file"
    );

    public function isValid($value)
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini','production');
        $pathToFile = $config->public->dir->images->authors;
        $fileName =  $_FILES['picturesauthors']['name'];
        $allPathAndFile = $pathToFile.'/'.$fileName;
        if(file_exists($allPathAndFile))
        {
          $this->_throw($fileName,self::CHECKNAMEFILE);
          return false;
        }
        return true;
    }

    /**
     * Throws an error of the given type
     *
     * @param  string $file
     * @param  string $errorType
     * @return false
     */
    protected function _throw($file, $errorType)
    {
        if ($file !== null) {
            $this->_value = $file;
        }

        $this->_error($errorType);
        return false;
    }
} 

<?php

/**
 * Number To Show Validation
 *
 * Model used to validate the system configuration input for the
 * Number of Products to show.
 *
 * @category   Training
 * @package    Training_ProductList
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Training_ProductList_Model_NumberToShowValidation
    extends Mage_Core_Model_Config_Data
{
    /**
     * @return \Mage_Core_Model_Abstract
     * @throws \Mage_Core_Exception
     */
    public function save()
    {
        $value = $this->getValue();
        
        if (!$this->_validate($value)) {
            Mage::throwException("Input '$value' should be an Integer.");
        }
        
        return parent::save();
    }
    
    /**
     * Validate the data value.
     *
     * @param $value
     *
     * @return bool
     */
    private function _validate($value)
    {
        return ctype_digit($value);
    }
}
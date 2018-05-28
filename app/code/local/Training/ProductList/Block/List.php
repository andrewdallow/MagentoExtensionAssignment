<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Training
 * @subpackage ProductList
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Training_ProductList_Block_List extends Mage_Catalog_Block_Product_List
{
    /**
     * Get the product list collection.
     *
     * @return \Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        $numProductsToShow = Mage::helper('training_productlist')
            ->getMaxProductsShown();
        $this->_productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('handle_display', 1)
            ->addAttributeToSort(
                Mage::app()->getRequest()->getParam('order'),
                Mage::app()->getRequest()->getParam('dir')
            )
            ->setPageSize($numProductsToShow);
        
        return $this->_productCollection;
    }
}
<?php

/**
 * Toolbar Block
 *
 * The custom Toolbar for the recommended product list.
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
class Training_ProductList_Block_Toolbar
    extends Mage_Catalog_Block_Product_List_Toolbar
{
    /**
     * Construct the toolbar
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_orderField = Mage::getStoreConfig(
            Mage_Catalog_Model_Config::XML_PATH_LIST_DEFAULT_SORT_BY
        );
        // Set viewing options
        $this->_availableMode = array('grid'   => $this->__('Grid'),
                                      'slider' => $this->__('Slider'));
        $this->setTemplate('catalog/product/list/toolbar.phtml');
    }
    
    /**
     * Get the number of products in the product list.
     *
     * @return int
     */
    public function getTotalNum()
    {
        /** @var Training_ProductList_Helper_Data $helper */
        $helper = Mage::helper('training_productlist');
        $numProductsToShow = $helper->getMaxProductsShown();
        
        return $this->getCollection()->setPageSize($numProductsToShow)->count();
    }
    
    
}
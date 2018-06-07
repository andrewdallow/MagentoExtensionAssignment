<?php

/**
 * Recommended Product List
 *
 * Manage the list of products to show in the Recommended Products page.
 *
 * @category   Training
 * @package    Training_ProductList
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Training_ProductList_Block_List extends Mage_Catalog_Block_Product_List
{
    const PRODUCT_ATTRIBUTE = 'handle_display';
    
    /**
     * Get the product list collection.
     *
     * @return \Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        /** @var Mage_Catalog_Model_Product $model */
        $model = Mage::getModel('catalog/product');
        /** @var Training_ProductList_Helper_Data $helper */
        $helper = Mage::helper('training_productlist');
    
        $numProductsToShow = $helper->getMaxProductsShown();
    
        if ($numProductsToShow) {
            $this->_productCollection = $this->_getRecommendedProductList(
                $model, $numProductsToShow
            );
        } else {
            $this->_productCollection = $this->_getEmptyProductList($model);
        }
        
        return $this->_productCollection;
    }
    
    /**
     * @param \Mage_Catalog_Model_Product $model
     * @param                             $numProductsToShow
     *
     * @return mixed
     */
    private function _getRecommendedProductList(
        $model,
        $numProductsToShow
    ) {
        return $model
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter(self::PRODUCT_ATTRIBUTE, 1)
            ->addAttributeToSort(
                Mage::app()->getRequest()->getParam('order'),
                Mage::app()->getRequest()->getParam('dir')
            )
            ->setPageSize($numProductsToShow);
    }
    
    /**
     * @param \Mage_Catalog_Model_Product $model
     *
     * @return mixed
     */
    private function _getEmptyProductList(Mage_Catalog_Model_Product $model)
    {
        return $model
            ->getCollection()
            ->addFieldToFilter('entity_id', 0);
    }
}
<?php

/**
 * Product List Helper Class
 *
 * @category   Training
 * @package    Training_ProductList
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Training_ProductList_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_MAX_PRODUCTS_SHOWN = 'catalog/trianing_productlist_list/max_products_shown';
    const XML_PATH_PRODUCTLIST_TITLE = 'catalog/trianing_productlist_list/productlist_title';
    
    /**
     * @param null $store
     *
     * @return mixed
     */
    public function getMaxProductsShown($store = null)
    {
        return Mage::getStoreConfig(
            self::XML_PATH_MAX_PRODUCTS_SHOWN, $store
        );
    }
    
    /**
     * @param null $store
     *
     * @return mixed
     */
    public function getProductListTitle($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_PRODUCTLIST_TITLE, $store);
    }
    
    /**
     * @param null $store
     *
     * @return mixed
     */
    public function getProductListUri($store = null)
    {
        $title = $this->getProductListTitle($store);
        return str_replace(' ', '-', strtolower($title));
    }
    
    
}
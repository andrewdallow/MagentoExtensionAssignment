<?php

/**
 * Product List Helper Class
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
class Training_ProductList_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_MAX_PRODUCTS_SHOWN = 'catalog/trianing_productlist_list/max_products_shown';
    
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
}
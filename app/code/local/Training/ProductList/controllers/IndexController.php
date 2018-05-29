<?php

/**
 * Index Controller
 *
 * Default Index controller for the recommended products list page.
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
class Training_ProductList_IndexController
    extends Mage_Core_Controller_Front_Action
{
    /**
     * Check customer is logged in before displaying pages.
     *
     * @return \Mage_Core_Controller_Front_Action|void
     */
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(
                Mage::helper('customer')->getLoginUrl()
            );
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
        
    }
    
    /**
     * Load and render the index page.
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
    
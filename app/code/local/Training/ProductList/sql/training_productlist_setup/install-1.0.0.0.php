<?php
/**
 * Database Setup Script
 *
 * Setup the database with a new product attribute and value set.
 *
 * Throws exception if attribute name is already in use.
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
$entityType = Mage_Catalog_Model_Product::ENTITY;
$attributeCode = 'handle_display';


try {
    $installer = $this;
    $installer->startSetup();
    
    // check if attribute code already exists.
    $existingAttrCodeId = Mage::getResourceModel('catalog/eav_attribute')
        ->loadByCode($entityType, $attributeCode)
        ->getId();
    
    if ($existingAttrCodeId) {
        throw new Exception(
            "Attribute Name '$attributeCode' already exists in the database."
        );
    }
    
    $installer->addAttribute(
        $entityType, $attributeCode, array(
            'group'            => 'General',
            'type'             => 'int',
            'backend'          => '',
            'frontend'         => '',
            'label'            => 'Recommended Product',
            'input'            => 'select',
            'class'            => '',
            'source'           => 'eav/entity_attribute_source_boolean',
            'visible'          => true,
            'required'         => false,
            'user_defined'     => false,
            'searchable'       => false,
            'filterable'       => true,
            'comparable'       => false,
            'visible_on_front' => false,
            'unique'           => false,
        )
    );
    $installer->endSetup();
    
} catch (Exception $exception) {
    Mage::logException($exception);
    Mage::log($exception->getMessage());
}

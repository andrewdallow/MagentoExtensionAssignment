# Magento 1.9.x Training_ProductList Module 

A Magento extension which displays a list of products chosen at the backend
to any logged in customer in the My Account section of 
the frontend. 

## The handle_display Attribute

A new attribute has been added to the catalog_product_entity called handle_display.
If the attribute name 'handle_display' already exist in the database then
an exception is thrown and logged in the Magento Exception log. 

The attribute is an integer with two possible values of:
        
        0 (No): do not display in Product list
        1 (Yes): display in Product list

It is a boolean value to flag whether a product should be in the product list
or not. 

The backend user can set this property for any product by navigating in the 
 menu to:

          Catalog | Manage Products | Edit [any product] | General
          
One then selects Yes or No for the 'Visible in Product List' option and then saves 
the product to set the value.

The database is setup using the sql/training_productlist_setup/install-1.0.0.0.php script.

## The Configuration Settings

One can set both the 'Product List Title' and the 
'Maximum Number of Products to List' in the System Configuration Options. They
are setup in the system.xml file. These are found at:

        System | Configuration | Catalog | My Account Product List
        
Note: the 'Maximum Number of Products to List' option is validated 
(Training_ProductList_Model_NumberToShowValidation) so that only integer
numbers can be specified. 

A value of '0' will list no products, while a value of '10' will list up to '10' 
products. 

Default Values:

        Product List Title: Recommended Products
        Maximum Number of Products to List: 10

Methods in the helper class 'Training_ProductList_Helper_Data' are used to
retrieve these values from the system configuration.

## The Product List Page

#### Route
The Product List can be found at the /product-list uri, defined in the config.xml
file routes. It is also listed in the My Account section under the name specified 
in the System Configuration (e.g. 'Recommended Products), defined in the 
custom theme layout file training_productlist.xml. 

This page can only be accessed when a customer is logged on, achieved by 
writing a 'preDispatch' method in the Training_ProductList_IndexController class 
which checks if the user is logged on. 

Training_ProductList_IndexController is also responsible for rendering the default
index page. 

#### Product List

The Product list block, Training_ProductList_Block_List, extends the Magento 
Product List block, Mage_Catalog_Block_Product_List, and overrides the 
_getProductCollection() method to only retrieve a product collection where 
'handle_display' is equal to 1. This method also uses the 'order' and 'dir' 
parameters in the URI to determine the collection sort order.

The display of the list is adapted from the Magento rwd_default theme.
The template list.phtml can display products in either the default 'Grid'
layout with template /List/grid.phtml or as a Slider with the /List/slider.phtml
template. The slider uses the 3rd party javascript called Slick for the slider, 
but is otherwise based on the grid format. 

The Training_ProductList_Block_Toolbar Block for the product list has also 
been customised by extending the Mage_Catalog_Block_Product_List_Toolbar Block 
to fix the view options to 'Grid' and 'Slider'. Clicking their corresponding 
links sets the 'mode' parameter in the uri and displays the product list in 
the chosen way. 

The Layout of the blocks are defined in the training_productlist.xml file in 
the theme directory. A custom stylesheet has also been added for the slider,
along with external CDN links to the Slick javascript library and css. 















<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Peerforest_MultiProduct_Block_Product_Customlist extends Mage_Catalog_Block_Product_List
{
    protected $pagePosition = 'more';
    
    protected function get_prod_count()
    {   
       Mage::getSingleton('catalog/session')->unsLimitPage();
       return Mage::helper('multiproduct')->productMaxLimit($this->getBlockLimitId());
    }
 
    protected function get_cur_page()
    {
        if($this->getRequestedPageId()){
            $pageid = intval($this->getRequestedPageId()) + 1;
        }
        else
        {
            $pageid = 1;
        }
       return $pageid;
    }
    
    
    protected function _getProductCollection()
    {
        if (is_null($this->_productCollection)) {
            
            $attributeId = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','custom_product');
            $attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);
            $attributeOptions = $attribute ->getSource()->getAllOptions();	
            
            foreach ($attributeOptions as $option)
            {
                if(strtolower($option['label']) == strtolower($this->getCustomproduct())) {
                    $filterId = $option['value'];
                    break;
                } 
            }
            
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        
           $collection->addAttributeToFilter('custom_product', array('finset'=>$filterId))
                    ->addStoreFilter();          
            $collection->setPageSize($this->get_prod_count());
            $collection->setCurPage($this->get_cur_page());            
            
            $numProducts = Mage::helper('multiproduct')->productMaxLimit($this->getBlockLimitId());
            if($collection->getLastPageNumber() <= $this->get_cur_page()-1) {
                $collection = new Varien_Data_Collection();
            }
            
            $this->_productCollection = $collection;
            if($this->_productCollection->count() <= $numProducts && $collection->getLastPageNumber() == $this->get_cur_page()){
                $this->pagePosition = 'last';
            }
        }        
        return $this->_productCollection;
    }
    
    public function getPagePosition()
    {
        $this->_getProductCollection();
        return $this->pagePosition;
    }
}

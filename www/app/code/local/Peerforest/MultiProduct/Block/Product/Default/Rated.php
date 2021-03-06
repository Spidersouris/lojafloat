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
class Peerforest_MultiProduct_Block_Product_Default_Rated extends Mage_Catalog_Block_Product_List
{
    protected $pagePosition = 'more';
    
    function get_prod_count()
    {   
       Mage::getSingleton('catalog/session')->unsLimitPage();
       return Mage::helper('multiproduct')->productMaxLimit($this->getBlockLimitId());
    }
 
    function get_cur_page()
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
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        // your custom filter
            $collection->joinField('rating_summary', 'review_entity_summary', 'rating_summary', 'entity_pk_value=entity_id',
                                   array('entity_type'=>1, 'store_id'=> Mage::app()->getStore()->getId()),
                                   'left');
            $collection->addFieldToFilter('rating_summary',array("notnull"=>true));
            $collection->addStoreFilter()
                    ->setOrder('rating_summary', 'desc');
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

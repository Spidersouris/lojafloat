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

/**
 * New products block
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Peerforest_MultiProduct_Block_Product_Default_New extends Mage_Catalog_Block_Product_List
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
        $todayStartOfDayDate  = Mage::app()->getLocale()->date()
            ->setTime('00:00:00')
            ->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);

        $todayEndOfDayDate  = Mage::app()->getLocale()->date()
            ->setTime('23:59:59')
            ->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);

        $collection = Mage::getResourceModel('catalog/product_collection');
        $collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());


        $collection = $this->_addProductAttributesAndPrices($collection)
            ->addStoreFilter()
            ->addAttributeToFilter('news_from_date', array('or'=> array(
                0 => array('date' => true, 'to' => $todayEndOfDayDate),
                1 => array('is' => new Zend_Db_Expr('null')))
            ), 'left')
            ->addAttributeToFilter('news_to_date', array('or'=> array(
                0 => array('date' => true, 'from' => $todayStartOfDayDate),
                1 => array('is' => new Zend_Db_Expr('null')))
            ), 'left')
            ->addAttributeToFilter(
                array(
                    array('attribute' => 'news_from_date', 'is'=>new Zend_Db_Expr('not null')),
                    array('attribute' => 'news_to_date', 'is'=>new Zend_Db_Expr('not null'))
                    )
              )
            ->addAttributeToSort('news_from_date', 'desc') ;
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
       return $this->_productCollection;
    }
    
    public function getPagePosition()
    {
        $this->_getProductCollection();
        return $this->pagePosition;
    }
}
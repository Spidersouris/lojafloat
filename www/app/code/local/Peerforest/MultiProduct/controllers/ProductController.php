<?php
class Peerforest_MultiProduct_ProductController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$getId = $_GET['pro'];
		$defaultTabs = array("new","random","rated");
		$filterBy = $getId;
		$activeTab = strtolower($getId);                        
		if(in_array($activeTab,$defaultTabs)) {
		    $activeTab = "_default_".$activeTab;
		}
		else {
		    $activeTab = "_customlist";
		}
		$this->loadLayout();
		$response = array();
		$response['product'] = $this->getLayout()->createBlock('multiproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setRequestedPageId(0)->setTemplate('catalog/product/multiproduct/list-loadmore.phtml')->toHtml();
		$response['pageposition'] = $this->getLayout()->createBlock('multiproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setRequestedPageId(0)->setTemplate('catalog/product/multiproduct/list-loadmore.phtml')->getPagePosition();
		
		$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));		
        }
	
	public function loadmoreAction()
	{		
		$getId = $_GET['pro'];
		$getPageId = $_GET['pageid'];		
		$defaultTabs = array("new","random","rated");		
		$filterBy = $getId;
		$activeTab = strtolower($getId);                        
		if(in_array($activeTab,$defaultTabs)) {
		    $activeTab = "_default_".$activeTab;
		}
		else {
		    $activeTab = "_customlist";
		}
		$this->loadLayout();
		$response = array();
		$response['product'] = $this->getLayout()->createBlock('multiproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setRequestedPageId($getPageId)->setTemplate('catalog/product/multiproduct/list-loadmore.phtml')->toHtml();
		$response['pageposition'] = $this->getLayout()->createBlock('multiproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setRequestedPageId($getPageId)->setTemplate('catalog/product/multiproduct/list-loadmore.phtml')->getPagePosition();
		
		$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
        }
}
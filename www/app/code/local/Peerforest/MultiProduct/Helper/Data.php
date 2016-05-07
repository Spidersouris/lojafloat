<?php 
class Peerforest_MultiProduct_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function productMaxLimit($id)
    {
	$limitConfig = array();
	$limitConfig['1c'] = 'multiproduct/custom/product_load_max';
	$limitConfig['3l'] = 'multiproduct/block_left/product_load_max';
	$limitConfig['3r'] = 'multiproduct/block_right/product_load_max';
	
	$default = 20;
	$limit = Mage::getStoreConfig($limitConfig[$id]);
	if($limit == null || $limit == " ") {
	    $limit = $default;
	}
	return $limit;
    }
}
?>
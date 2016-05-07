<?php class Peerforest_ExtraConfig_Model_ProductStyleType
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'0', 'label'=>Mage::helper('ExtraConfig')->__('Default')),
            array('value'=>'1', 'label'=>Mage::helper('ExtraConfig')->__('Product Style 1'))            
        );
    }

}?>
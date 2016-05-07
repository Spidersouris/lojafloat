<?php class Peerforest_ExtraConfig_Model_ProductThumnailSlider
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'x', 'label'=>Mage::helper('ExtraConfig')->__('Horizontal')), 
            array('value'=>'y', 'label'=>Mage::helper('ExtraConfig')->__('Vertical'))     
        );
    }

}?>
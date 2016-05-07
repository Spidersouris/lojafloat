<?php class Peerforest_ExtraConfig_Model_Headertype
{
    public function toOptionArray()
    {
        return array(
            
            array('value'=>'default', 'label'=>Mage::helper('ExtraConfig')->__('Default')),
            array('value'=>'header2', 'label'=>Mage::helper('ExtraConfig')->__('Header 2'))
        );
    }

}?>
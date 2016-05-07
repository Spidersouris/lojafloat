<?php class Peerforest_ExtraConfig_Model_Blockposition extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
   public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = array(
                array(
                    'value' => 'bottom',
                    'label' => 'Bottom',
                ),
                 array(
                    'value' => 'top',
                    'label' => 'Top',
                ),
    
            );
        }
        return $this->_options;
    }

}?>
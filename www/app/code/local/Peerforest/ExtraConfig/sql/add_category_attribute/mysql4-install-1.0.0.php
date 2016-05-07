<?php

$this->startSetup();

$this->addAttribute('catalog_category', 'category_label', array(
    'group'         => 'Extra Settings',
    'input'         => 'text',
    'type'          => 'varchar',
    'label'         => 'Category Label',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$this->addAttribute('catalog_category', 'category_block_position', array(
    'group'         => 'Extra Settings',
    'input'         => 'select',
    'source'        => 'ExtraConfig/Blockposition',
    'type'          => 'varchar',
    'label'         => 'Category Menu Block Position (Custom Menu)',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$this->addAttribute('catalog_category', 'custom_block_position', array(
    'group'         => 'Extra Settings',
    'input'         => 'select',
    'source'        => 'ExtraConfig/Customblockposition',
    'type'          => 'varchar',
    'label'         => 'Custom Block Position:',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$this->endSetup();
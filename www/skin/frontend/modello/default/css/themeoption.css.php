<?php
define('MAGENTO_ROOT', (dirname(__FILE__).'/../../../../..'));
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
require_once $mageFilename;

umask(0);
if ( empty($_GET['store']) ) {
    $_GET['store'] = '';
}
Mage::app( $_GET['store'] );

header("Content-type: text/css; charset: UTF-8");

$instance = Mage::helper("ExtraConfig");

$cssValueArray = array();
$cssColorValueArray = Mage::getStoreConfig('themecolor' , $_GET['store']);
$cssSettingValueArray = Mage::getStoreConfig('mygeneral' , $_GET['store']);
$cssLayoutValueArray = Mage::getStoreConfig('themelayout' , $_GET['store']);
$cssValueArray = array_replace_recursive($cssSettingValueArray,array_replace_recursive($cssLayoutValueArray,$cssColorValueArray));

foreach($cssValueArray as $cssFieldKey => $cssFieldValue)
{
  foreach($cssFieldValue as $cssKey => $cssValue)
  {    
    if(($cssValue == "" || $cssValue == null || $cssValue == '--select--' ))
    {
      unset($cssValueArray[$cssFieldKey][$cssKey]);
    }   
  }
}


foreach($cssSettingValueArray as $cssFieldKey => $cssFieldValue)
{
  foreach($cssFieldValue as $cssKey => $cssValue)
  {    
    if(($cssValue == "" || $cssValue == null || $cssValue == '--select--' ))
    {
      unset($cssSettingValueArray[$cssFieldKey][$cssKey]);
    }   
  }
}

?>

/* start Colors */
        <?php if(isset($cssValueArray['colors']['primary_color'])){ ?>
        
            a:hover,
            .shopping_cart .dropdown-toggle span.price,
            div.menu a:hover, div.menu.act a, div.menu.active a,
            div.wp-custom-menu-popup a.itemMenuName:hover, div.wp-custom-menu-popup a.itemMenuName.act,
            .nav-container #nav li a.over,
            .nav-container #nav a:hover,
            .nav-container #nav li.active a.level-top,
            .links > li > a:hover,
            .owl-theme .owl-controls .owl-buttons div:hover, .banner .owl-theme .owl-controls .owl-buttons div:hover,
            .form-search .button:hover span,
            .footer-container a:hover,
            #sidenav li.level0.active > a,
            .limiter .dropdown .dropdown-menu a:hover, .sort-by .dropdown .dropdown-menu a:hover, .limiter .dropdown .dropdown-menu a.selected, .sort-by .dropdown .dropdown-menu a.selected,
            .sorter .view-mode .grid:hover, .sorter .view-mode .list:hover, .sorter .view-mode .grid.grid-mode-active, .sorter .view-mode .list.list-mode-active,
            a.scrollup:hover,
            .products-list .link-learn,
            div.alert-inner button.close:hover,
            .checkout-progress li.active,
            .multiple-checkout .col2-set h3.legend, .info-set h3.legend,
            .box-account.box-info .box-content a, .addresses-list ol li a,
            .order-date,
            .toggleMenu.active, .toggleMenu:hover,
            #menu-button a.active, #menu-button a:hover
            { color: <?php echo $cssValueArray['colors']['primary_color'];?>; }
            
            .dropdown-toggle .count,
            button.button span,
            .owl-theme .owl-controls .owl-page.active, .owl-theme .owl-controls.clickable .owl-page:hover,
            .blocksubcribe-full .block-subscribe .actions button.button:hover span,
            .pager .pages li:hover, .pager .pages li.current,
            .quantity_counter a:hover,
            .buttons-set .back-link a,
            div.alert a,
            div.alert a.cart:hover,
            button.btn-checkout:hover span,
            .menu-mobile .parentMenu a:hover,
            .icon-bg-color span.icon
            { background-color: <?php echo $cssValueArray['colors']['primary_color'];?>; }
            
            <?php if(isset($cssValueArray['colors']['primary_color'])){ ?>
                    #nav.color a:hover, #nav.color li.active a.level-top
                    {  background-color: <?php echo $cssValueArray['colors']['primary_color']; ?> !important; }
            <?php } ?>         
            
            .owl-theme .owl-controls .owl-buttons div:hover, .banner .owl-theme .owl-controls .owl-buttons div:hover,
            input.input-text:hover, select:hover, textarea:hover, input.input-text:focus, select:focus, textarea:focus,
            a.scrollup:hover
            { border-color:<?php echo $cssValueArray['colors']['primary_color'];?>; }     
            
            .nav-maincontainer,
            .cart .totals
            {  border-bottom-color: <?php echo $cssValueArray['colors']['primary_color'];?>; }
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['colors']['border_color'])){ ?>
            input.input-text, select, textarea, input.product-custom-option,
            .products-grid .item:hover,
            div.wp-custom-menu-popup,
            .nav-container #nav ul,
            .limiter .dropdown, .sort-by .dropdown,
            .limiter .dropdown .dropdown-menu, .sort-by .dropdown .dropdown-menu,
            .resp-vtabs .resp-tabs-container,
            .resp-vtabs li.resp-tab-active,
            .my-account .tags-list,
            .product-view .box-reviews dd,
            .product-view .box-reviews dt,
            .checkout-multishipping-shipping .box-sp-methods,
            .sp-methods .form-list,
            .col3-layout .resp-tab-content,
            h2.resp-accordion,
            .gift-messages-form,
            .header-primarycontainer.header2
            {  border-color:  <?php echo $cssValueArray['colors']['border_color'];?>; }

            .footer-top-border,
            .toolbar .pager,
            .block .actions,
            .pager,
            .multiple-checkout .buttons-set,
            .nav-container #nav li ul li ul.shown-sub
            {  border-top-color:  <?php echo $cssValueArray['colors']['border_color'];?>; }
            
            .collapsible .block-title,
            ul.separator li a,
            .footer-bottom-border,
            div.menu.active:after,
            div.wp-custom-menu-popup a.itemMenuName,
            .nav-container #nav li ul li a,
            .block .block-title strong,
            .product-view .product-shop .product-name,
            .data-table th, .data-table td,
            .cart .discount h2, .cart .shipping h2,
            .fieldset .legend, .multiple-checkout .col2-set h2.legend, .info-set h2.legend,
            .opc .step-title:after,
            #opc-login h3,
            .box-account .box-head,
            .dashboard .box .box-title,
            .pager,
            .order-info-box .box .box-title,
            .order-details h2,
            .addresses-list h2
            {  border-bottom-color:  <?php echo $cssValueArray['colors']['border_color'];?>; }
            
            .product-tabs .gen-tabs li,
            .product-view .box-tags .product-tags li
            {  border-right-color:  <?php echo $cssValueArray['colors']['border_color'];?>; }
            
            .separator
            {  color:  <?php echo $cssValueArray['colors']['border_color'];?>; }
            
            .products-grid div.btn-cart:after,
            .footer-top .logo:after,
            .divider
            {  background-color:  <?php echo $cssValueArray['colors']['border_color'];?>; }
            
        <?php } ?>
        

/* end Colors */

/* start Button */
        <?php if(isset($cssValueArray['button']['button_color'])){ ?>
                button.button span,
                .buttons-set .back-link a,
                div.alert a,
                div.alert a.cart:hover,
                button.btn-checkout:hover span,
                .blocksubcribe-full .block-subscribe .actions button.button:hover span
                {  color: <?php echo $cssValueArray['button']['button_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['buttonhover_color'])){ ?>
                button.button:hover span,
                .buttons-set .back-link a:hover,
                div.alert a:hover,
                div.alert a.cart,
                button.btn-checkout span,
                .blocksubcribe-full .block-subscribe .actions button.button span
                { color: <?php echo $cssValueArray['button']['buttonhover_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['button_color'])){ ?>
                button.btn-checkout:hover span
                {  color: <?php echo $cssValueArray['button']['button_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['buttonhover_color'])){ ?>
                button.btn-checkout span
                { color: <?php echo $cssValueArray['button']['buttonhover_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['button_bg_color'])){ ?>
                button.button span,
                .buttons-set .back-link a,
                div.alert a,
                button.btn-checkout:hover span,
                div.alert a.cart:hover
                {  background-color: <?php echo $cssValueArray['button']['button_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['buttonhover_bg_color'])){ ?>
                button.button:hover span,
                .buttons-set .back-link a:hover,
                div.alert a:hover,
                button.btn-checkout span,
                div.alert a.cart
                {  background-color: <?php echo $cssValueArray['button']['buttonhover_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['button_bg_color'])){ ?>
                button.btn-checkout:hover span
                {  background-color: <?php echo $cssValueArray['button']['button_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['button']['buttonhover_bg_color'])){ ?>
                button.btn-checkout span
                {  background-color: <?php echo $cssValueArray['button']['buttonhover_bg_color'];?>; }
        <?php } ?>
        
/* end Button */

/* start Background Option */
        <?php if(isset($cssValueArray['background']['background_color']) || isset($cssValueArray['background']['background_pattern'])) {
            $bg_color   = isset($cssValueArray['background']['background_color']) ? "background-color:".$cssValueArray['background']['background_color'].";": "";
            $bg_patern  = isset($cssValueArray['background']['background_pattern']) ? "background-image:url(".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'pattern/'.$cssValueArray['background']['background_pattern'].");": "";
        ?>		
                body,
                .resp-vtabs li.resp-tab-active,
                .postContent.feature img
                    {
                        <?php echo $bg_color." ".$bg_patern;?>
                    }
        <?php   } elseif(isset($cssValueArray['background']['background_image'])){ ?>
                body,
                .resp-vtabs li.resp-tab-active,
                .postContent.feature img
                {
                        background-image: url(<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'custom/image/'.$cssValueArray['background']['background_image'];?>);
                        background-attachment: <?php echo $cssValueArray['background']['bg_attachment'];?>;
                        background-position: <?php echo $cssValueArray['background']['bg_position_y'];?> <?php echo $cssValueArray['background']['bg_position_x'];?>;
                        background-repeat: <?php echo $cssValueArray['background']['bg_repeat'];?>;
         
                    <?php if ($cssValueArray['background']['bg_attachment'] == 'fixed') { ?>
                        background-size: 100%;
                    <?php } ?> 
                }            
        <?php } ?>
/* End Background Option */


/* Theme Fonts Settings */
        <?php if(isset($cssValueArray['themefont']['titlefont'])) {  ?>
                    .page-title h1,
                    .page-title h2,
                    .page-print h1
                    {font-family: '<?php echo $cssValueArray['themefont']['titlefont']; ?>';} 
        <?php } ?>  
        
        <?php if(isset($cssValueArray['themefont']['titlefont_color'])) {  ?>
                .page-title h1,
                .page-title h2,
                .page-print h1
                {  color: <?php echo $cssValueArray['themefont']['titlefont_color'];?>;}
        <?php } ?>
        
        
        <?php if(isset($cssValueArray['themefont']['subtitlefont'])) {  ?>
                .cart .discount h2,
                .cart .shipping h2,
                .block .block-title strong,
                .account-login h2,
                #opc-login h3,
                .collapsible .block-title
                {font-family: '<?php echo $cssValueArray['themefont']['subtitlefont']; ?>';} 
        <?php } ?>
            
        <?php if(isset($cssValueArray['themefont']['subtitlefont_color'])) {  ?>
                .cart .discount h2, .cart .shipping h2,
                .block .block-title strong,
                .account-login h2,
                #opc-login h3,
                .collapsible .block-title
                {  color: <?php echo $cssValueArray['themefont']['subtitlefont_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['themefont']['subtitlefont_border_color'])) {  ?>
                .cart .discount h2,
                .cart .shipping h2,
                .block .block-title strong,
                .account-login h2,
                #opc-login h3,
                .collapsible .block-title
                {  border-color: <?php echo $cssValueArray['themefont']['subtitlefont_border_color'];?>;}
        <?php } ?>        
            
        <?php if(isset($cssValueArray['themefont']['bodyfont'])) {  ?>
                            body,
                            button.button,
                            input, select, textarea, button
                            {font-family: '<?php echo $cssValueArray['themefont']['bodyfont']; ?>';}
        <?php } ?>	
         
        <?php if(isset($cssValueArray['themefont']['bodyfont_color'])) {  ?>
                body,
                a
                {  color: <?php echo $cssValueArray['themefont']['bodyfont_color'];?>;}
        <?php } ?> 
/* End Theme Fonts Settings */


/* Start Header */    
        <?php if(isset($cssValueArray['header']['headerbg_color']) || isset($cssValueArray['header']['headerbg_pattern'])) {
            $bg_color   = isset($cssValueArray['header']['headerbg_color']) ? "background-color:".$cssValueArray['header']['headerbg_color'].";": "";
            $bg_patern  = isset($cssValueArray['header']['headerbg_pattern']) ? "background-image:url(".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'pattern/'.$cssValueArray['header']['headerbg_pattern'].");": "";
        ?>		
                .header-container
                    {
                        <?php echo $bg_color." ".$bg_patern;?>
                    }            
        <?php }	elseif(isset($cssValueArray['header']['headerbg_image'])) { ?>    
                .header-container
                {
                        background-image: url(<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'custom/image/'.$cssValueArray['header']['headerbg_image'];?>);
                        background-attachment: <?php echo $cssValueArray['header']['headerbg_attachment'];?>;
                         background-position: <?php echo $cssValueArray['header']['headerbg_position_y'];?> <?php echo $cssValueArray['header']['headerbg_position_x'];?>;
                        background-repeat: <?php echo $cssValueArray['header']['headerbg_repeat'];?>;
                        
                        <?php if ($cssValueArray['header']['headerbg_attachment']== 'fixed') { ?>
                            background-size: 100%;
                        <?php	} ?>
                }                  
        <?php }?>
            
        <?php if(isset($cssValueArray['header']['header_topbar_bg_color'])){ ?>
                .header-container .header-topcontainer                
                {  background-color: <?php echo $cssValueArray['header']['header_topbar_bg_color'];?>;}
        <?php } ?>
                
        <?php if(isset($cssValueArray['header']['header_wishlist_font_color'])){ ?>
                .wishlist.dropdown .dropdown-toggle.cover > div,
                .wishlist.dropdown .dropdown-toggle.cover > div a
                {  color: <?php echo $cssValueArray['header']['header_wishlist_font_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_wishlist_fonthover_color'])){ ?>
                .wishlist.dropdown .dropdown-toggle.cover > div a:hover
                {  color: <?php echo $cssValueArray['header']['header_wishlist_fonthover_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_countbg_color'])){ ?>
                .shopping_cart.dropdown .dropdown-toggle.cover > div .count
                {  background-color: <?php echo $cssValueArray['header']['header_cart_countbg_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_countbghover_color'])){ ?>
                .shopping_cart.dropdown:hover > .dropdown-toggle.cover > div .count
                {  background-color: <?php echo $cssValueArray['header']['header_cart_countbghover_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_font_color'])){ ?>
                .shopping_cart.dropdown .dropdown-toggle.cover > div
                {  color: <?php echo $cssValueArray['header']['header_cart_font_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_fonthover_color'])){ ?>
                .shopping_cart.dropdown:hover > .dropdown-toggle.cover > div
                {  color: <?php echo $cssValueArray['header']['header_cart_fonthover_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_price_color'])){ ?>
                .shopping_cart.dropdown .dropdown-toggle.cover > div span.price
                {  color: <?php echo $cssValueArray['header']['header_cart_price_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['header_cart_pricehover_color'])){ ?>
                .shopping_cart.dropdown:hover > .dropdown-toggle.cover > div span.price
                {  color: <?php echo $cssValueArray['header']['header_cart_pricehover_color'];?>;}
        <?php } ?>        
                        
        <?php if(isset($cssValueArray['header']['language_currency_fontcolor'])){ ?>
                .language .language-menu a, .currency .currency-menu a
                { color: <?php echo $cssValueArray['header']['language_currency_fontcolor'];?>;}
        <?php } ?>
                
        <?php if(isset($cssValueArray['header']['language_currency_font_hovercolor'])){ ?>
                .language .language-menu a:hover, .currency .currency-menu a:hover
                { color: <?php echo $cssValueArray['header']['language_currency_font_hovercolor'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['header']['language_currency_font_selectedcolor'])){ ?>
                .language .language-menu a.selected, .currency .currency-menu a.selected
                { color: <?php echo $cssValueArray['header']['language_currency_font_selectedcolor'];?>;}
        <?php } ?>
                
        <?php if(isset($cssValueArray['header']['stickyheader_bg_color'])){ ?>
                .nav-maincontainer.fixed
                { background-color: <?php echo $cssValueArray['header']['stickyheader_bg_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['header']['header_border_bottom_color'])){ ?>
                .nav-maincontainer
                { border-bottom-color: <?php echo $cssValueArray['header']['header_border_bottom_color'];?>;}
        <?php } ?>            
            
        <?php if($cssSettingValueArray['header']['display_header_bottom_border'] == 0) {  ?>
                .nav-maincontainer{border-bottom: none;}
        <?php } ?>
        
        <?php if($cssSettingValueArray['header']['display_logo_position'] == 1) {  ?>
                .default .logo{margin-top: <?php echo $cssValueArray['header']['display_logo_positiontop'];?>px;}
        <?php } ?>        
        
/* End Header */


/* Start Menu */
        <?php if(isset($cssValueArray['menu']['topmenu_background'])){ ?>
                .nav-maincontainer
                {  background-color: <?php echo $cssValueArray['menu']['topmenu_background'];?>; }
        <?php } ?>  
            
        <?php if(isset($cssValueArray['menu']['topmenu_fonts'])){ ?>
                .nav-container #nav li.level0 a.level-top,
                .nav-container #nav li.home a.level-top,
                div.menu a
                {font-family: '<?php echo $cssValueArray['menu']['topmenu_fonts']; ?>';}                    
        <?php } ?>
                
        <?php if(isset($cssValueArray['menu']['topmenu_fonts_color'])){ ?>
                .nav-container #nav li.level0 a.level-top,
                .nav-container #nav li.home a.level-top,
                div.menu a:link,
                div.menu a:visited
                { color: <?php echo $cssValueArray['menu']['topmenu_fonts_color'];?>; }
        <?php } ?>   
            
        <?php if(isset($cssValueArray['menu']['topmenu_fontshover_color'])){ ?>
                .nav-container #nav li.level0 a.level-top.over,
                .nav-container #nav li.level0 a.level-top:hover,
                .nav-container #nav li.level0.active a.level-top,
                .nav-container #nav li.home.active a.level-top,
                .nav-container #nav li.home a.level-top:hover,
                div.menu a:hover,div.menu.act a,div.menu.active a
                { color: <?php echo $cssValueArray['menu']['topmenu_fontshover_color'];?>; }
        <?php } ?>                
            
        <?php if(isset($cssValueArray['menu']['topmenu_fontshover_bg_color'])){ ?>
                div.menu a:hover, div.menu.act a, div.menu.active a,
                .nav-container #nav li.level0 a.level-top.over,
                .nav-container #nav li.level0 a.level-top:hover,
                .nav-container #nav li.level0.active a.level-top
                { background: <?php echo $cssValueArray['menu']['topmenu_fontshover_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['menu']['topmenu_selected_fonts_color'])){ ?>
                .nav-container #nav li.level0.active a.level-top,
                .nav-container #nav li.home.active a.level-top,
                div.menu.act a
                { color: <?php echo $cssValueArray['menu']['topmenu_selected_fonts_color'];?>; }
        <?php } ?>        
        
        <?php if(isset($cssValueArray['menu']['topmenu_selected_background'])){ ?>
                .nav-container #nav li.level0.active a.level-top,
                .nav-container #nav li.home.active a.level-top,
                div.menu.act a
                { background: <?php echo $cssValueArray['menu']['topmenu_selected_background'];?>; }
        <?php } ?>        
        
        
        <?php if(isset($cssValueArray['menu']['menu_border_color'])){ ?>
                div.wp-custom-menu-popup,
                .nav-container #nav ul
                { border-color: <?php echo $cssValueArray['menu']['menu_border_color'];?>; }
                
                .nav-container #nav li ul li ul.shown-sub
                { border-top-color: <?php echo $cssValueArray['menu']['menu_border_color'];?>; }
                
                div.menu.active:after
                { border-bottom-color: <?php echo $cssValueArray['menu']['menu_border_color'];?>; }
        <?php } ?>        
            
        <?php if(isset($cssValueArray['menu']['menu_background'])){ ?>
               .nav-container #nav ul,
                div.wp-custom-menu-popup
                {  background-color: <?php echo $cssValueArray['menu']['menu_background'];?>; }
                
                div.menu.active:before
                { border-bottom-color: <?php echo $cssValueArray['menu']['menu_background'];?>; }
        <?php } ?>        
            
        <?php if(isset($cssValueArray['menu']['submenu_fonts'])){ ?>
                div.wp-custom-menu-popup a.itemMenuName.level1        
                {font-family: '<?php echo $cssValueArray['menu']['submenu_fonts']; ?>';}                    
        <?php } ?>
            
        <?php if(isset($cssValueArray['menu']['submenu_fonts_color'])){ ?>
                div.wp-custom-menu-popup a.itemMenuName.level1
                { color: <?php echo $cssValueArray['menu']['submenu_fonts_color'];?>; }
        <?php } ?>
            
        <?php if(isset($cssValueArray['menu']['submenu_fontshover_color'])){ ?>
                div.wp-custom-menu-popup a.itemMenuName.level1:hover,
                div.wp-custom-menu-popup a.itemMenuName.level1.act
                { color: <?php echo $cssValueArray['menu']['submenu_fontshover_color'];?>; }
        <?php } ?>
            
        <?php if(isset($cssValueArray['menu']['submenu_font_border_color'])){ ?>
                div.wp-custom-menu-popup a.itemMenuName,
                .nav-container #nav li ul li a
                { border-bottom-color: <?php echo $cssValueArray['menu']['submenu_font_border_color'];?>; }
                
        <?php } ?>             
            
        <?php if(isset($cssValueArray['menu']['menu_fonts'])){ ?>
                .nav-container #nav li ul li a,
                div.wp-custom-menu-popup .itemSubMenu a.itemMenuName,
                .menu_customlinks li
                {font-family: '<?php echo $cssValueArray['menu']['menu_fonts']; ?>';}
        <?php } ?>                
            
        <?php if(isset($cssValueArray['menu']['menu_fonts_color'])){ ?>
                .nav-container #nav li ul li a,
                div.wp-custom-menu-popup .itemSubMenu a.itemMenuName
                { color: <?php echo $cssValueArray['menu']['menu_fonts_color'];?>; }
        <?php } ?>
            
        <?php if(isset($cssValueArray['menu']['menu_fontshover_color'])){ ?>
                .nav-container #nav li ul li a:hover,
                .nav-container #nav li ul li a.over,
                div.wp-custom-menu-popup .itemSubMenu a.itemMenuName:hover,
                div.wp-custom-menu-popup .itemSubMenu a.itemMenuName.act
                { color: <?php echo $cssValueArray['menu']['menu_fontshover_color'];?>; }
        <?php } ?>        
            
        <?php if(isset($cssValueArray['menu']['menu_fontshover_bg_color'])){ ?>
                .nav-container #nav li ul li a:hover,.nav-container #nav li ul li a.over,
                div.wp-custom-menu-popup a.itemMenuName:hover, div.wp-custom-menu-popup a.itemMenuName.act
                { background-color: <?php echo $cssValueArray['menu']['menu_fontshover_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['menu']['label_font_color'])){ ?>
                span.category-label
                { color: <?php echo $cssValueArray['menu']['label_font_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['menu']['label_hoverfont_color'])){ ?>
                div.menu.active a span.category-label,
                .nav-container #nav li a.over span.category-label,
                a:hover span.category-label
                { color: <?php echo $cssValueArray['menu']['label_hoverfont_color'];?>; }
        <?php } ?>        
        
        <?php if(isset($cssValueArray['menu']['label_bg_color'])){ ?>
                span.category-label
                { background-color: <?php echo $cssValueArray['menu']['label_bg_color'];?>; }
                div.menu a span.category-label::before, .nav-container #nav a span.category-label::before
                { border-top-color: <?php echo $cssValueArray['menu']['label_bg_color'];?>; }
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['menu']['label_hoverbg_color'])){ ?>
                div.menu.active a span.category-label,
                .nav-container #nav li a.over span.category-label,
                a:hover span.category-label
                { background-color: <?php echo $cssValueArray['menu']['label_hoverbg_color'];?>; }
                div.menu.active a span.category-label:before,
                .nav-container #nav a.over span.category-label:before
                { border-top-color: <?php echo $cssValueArray['menu']['label_hoverbg_color'];?>; }
                
        <?php } ?>        
   
/* End Menu */


/* Responsive Menu Starts */
       
        <?php if(isset($cssValueArray['responsivemenu']['menu_seperator_color'])) {  ?>
            .menu-mobile .parentMenu,
            #nav.color li a
                {   border-color: <?php echo $cssValueArray['responsivemenu']['menu_seperator_color']; ?>;   }                
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['menu_font_color'])) {  ?>
            .menu-mobile .parentMenu a,
            #nav.color a
                {   color: <?php echo $cssValueArray['responsivemenu']['menu_font_color']; ?> !important; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['menu_hoverfont_color'])) {  ?>
            .menu-mobile .parentMenu a:hover,
            #nav.color a:hover
                {   color: <?php echo $cssValueArray['responsivemenu']['menu_hoverfont_color']; ?> !important; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['menu_bg_color'])) {  ?>
            .menu-mobile .parentMenu a,
            #nav.color a
                {   background-color: <?php echo $cssValueArray['responsivemenu']['menu_bg_color']; ?> !important; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['menu_hoverbg_color'])) {  ?>
            .menu-mobile .parentMenu a:hover,
            #nav.color a:hover,
            #nav.color li.active a.level-top
                {   background-color: <?php echo $cssValueArray['responsivemenu']['menu_hoverbg_color']; ?> !important; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['responsive_menu_font_family'])) {  ?>
            .menu-mobile .parentMenu a:link,
            .menu-mobile .parentMenu a:visited,
            #nav.color a    
                {   font-family: '<?php echo $cssValueArray['responsivemenu']['responsive_menu_font_family']; ?>';} 
        <?php } ?>        
        
        <?php if(isset($cssValueArray['responsivemenu']['arrow_color'])) {  ?>
            #custommenu-mobile .button,
            #custommenu-mobile .button:hover,
            #nav.color li .more
                {   color: <?php echo $cssValueArray['responsivemenu']['arrow_color']; ?>;   }                
        <?php } ?>
        
        
        <?php if(isset($cssValueArray['responsivemenu']['arrow_background_color'])) {  ?>
            #custommenu-mobile .button,
            #custommenu-mobile .button:hover,
            #nav.color li .more
                {   background-color: <?php echo $cssValueArray['responsivemenu']['arrow_background_color']; ?>;   }                
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['button_color'])) {  ?>
            #menu-button a,
            .toggleMenu
               {   color: <?php echo $cssValueArray['responsivemenu']['button_color']; ?>;  }               
        <?php } ?>        
        
        
        <?php if(isset($cssValueArray['responsivemenu']['button_hover_color'])) {  ?>
           #menu-button a.active, #menu-button a:hover,
            .toggleMenu.active, .toggleMenu:hover
                {   color: <?php echo $cssValueArray['responsivemenu']['button_hover_color']; ?> !important;   }
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['responsivemenu']['button_selected_color'])) {  ?>
            #menu-button a.active,
            .toggleMenu.active
                {   color: <?php echo $cssValueArray['responsivemenu']['button_selected_color']; ?> !important;  }                
        <?php } ?>        

/* Responsive Menu Ends */

/* Banner Starts*/   
        <?php if(isset($cssValueArray['banner']['banner_title_color'])){ ?>
                .caption .heading
                {color: <?php echo $cssValueArray['banner']['banner_title_color'];?>;}
        <?php } ?>   
            
        <?php if(isset($cssValueArray['banner']['banner_content_color'])){ ?>
                .caption p
                {color: <?php echo $cssValueArray['banner']['banner_content_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['banner']['banner_title_fontsize'])){ ?>
               .caption .heading
                {font-size: <?php echo $cssValueArray['banner']['banner_title_fontsize'];?>px;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['banner']['banner_arrow_color'])){ ?>
               .owl-theme .owl-controls .owl-page
                {color: <?php echo $cssValueArray['banner']['banner_arrow_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['banner']['banner_arrow_hover_color'])){ ?>
               .owl-theme .owl-controls .owl-page.active,
               .owl-theme .owl-controls.clickable .owl-page:hover
                {color: <?php echo $cssValueArray['banner']['banner_arrow_hover_color'];?>;}
        <?php } ?>                
        
        <?php if(isset($cssValueArray['banner']['banner_arrowhover_bg_color'])){ ?>
               .owl-theme .owl-controls .owl-page.active,
               .owl-theme .owl-controls.clickable .owl-page:hover
                {background-color: <?php echo $cssValueArray['banner']['banner_arrowhover_bg_color'];?>;}
        <?php } ?>           
        
        
            
/* End Banner */

/* Tab */

        <?php if(isset($cssValueArray['tab']['tab_border_color'])){ ?>
                .resp-vtabs li.resp-tab-active,
                .resp-vtabs .resp-tabs-container,
                h2.resp-accordion,
                .resp-vtabs .resp-tab-content,
                .col3-layout .resp-tab-content
                {border-color: <?php echo $cssValueArray['tab']['tab_border_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['tab']['tab_font_color'])){ ?>
                .resp-vtabs .resp-tabs-list li,
                h2.resp-accordion
                {color: <?php echo $cssValueArray['tab']['tab_font_color'];?>;}
                
                .resp-arrow
                {border-top-color: <?php echo $cssValueArray['tab']['tab_font_color'];?>;}
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['tab']['tab_font_hover_color'])){ ?>
                .resp-vtabs .resp-tabs-list li:hover,
                .resp-vtabs li.resp-tab-active,
                h2.resp-accordion:hover
                {color: <?php echo $cssValueArray['tab']['tab_font_hover_color'];?>;}
                
                h2.resp-accordion:hover .resp-arrow
                {border-top-color: <?php echo $cssValueArray['tab']['tab_font_hover_color'];?>;}                
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['tab']['tab_font_selected_color'])){ ?>
                .resp-vtabs li.resp-tab-active,
                .resp-vtabs li.resp-tab-active:hover,
                h2.resp-tab-active,
                h2.resp-tab-active:hover
                {color: <?php echo $cssValueArray['tab']['tab_font_selected_color'];?>;}
                
                h2.resp-tab-active span.resp-arrow
                {border-bottom-color: <?php echo $cssValueArray['tab']['tab_font_selected_color'];?>;}
        <?php } ?>
        
        

/* End Tab */

/* Sidebar Starts */       
        <?php if(isset($cssValueArray['sidebar']['sidebar_background_color'])){ ?>
                .sidebar .block .block-content
                {  background-color: <?php echo $cssValueArray['sidebar']['sidebar_background_color'];?>; }
        <?php } ?> 
            
        <?php if(isset($cssValueArray['sidebar']['sidebar_title_fonts'])){ ?>
            .sidebar .block .block-title strong,
            .category-full .col-left .block.block-layered-nav .block-content .view .block-title
               {font-family: '<?php echo $cssValueArray['sidebar']['sidebar_title_fonts']; ?>';}            
        <?php } ?>    
            
        <?php if(isset($cssValueArray['sidebar']['sidebar_title_fonts_color'])){ ?>
                .sidebar .block .block-title strong,
                .category-full .col-left .block.block-layered-nav .block-content .view .block-title
                {  color: <?php echo $cssValueArray['sidebar']['sidebar_title_fonts_color'];?>; }
        <?php } ?>
        <?php if(isset($cssValueArray['sidebar']['sidebar_title_fonts_bg_color'])){ ?>
                .sidebar .block .block-title
                {  background-color: <?php echo $cssValueArray['sidebar']['sidebar_title_fonts_bg_color'];?>; }
        <?php } ?>
        
        <?php if(isset($cssValueArray['sidebar']['sidebar_title_bottom_border_color'])){ ?>
                .sidebar .block .block-title,
                .category-full .col-left .block.block-layered-nav .block-content .view .block-title
                {  border-color: <?php echo $cssValueArray['sidebar']['sidebar_title_bottom_border_color'];?>; }
        <?php } ?>        
        
        <?php if(isset($cssValueArray['sidebar']['sidebar_fonts_color'])){ ?>
                .sidebar .block-content,
                .sidebar .block li a,
                .sidebar .block .actions a
                {  color: <?php echo $cssValueArray['sidebar']['sidebar_fonts_color'];?>; }
        <?php } ?>   
            
        <?php if(isset($cssValueArray['sidebar']['sidebar_linkhover_color'])){ ?>
                .sidebar .block li a:hover,
                .sidebar .block .actions a:hover,
                #sidenav li.level0.active > a,
                .sidebar .block-account .block-content li.current
                { color: <?php echo $cssValueArray['sidebar']['sidebar_linkhover_color'];?>; }
        <?php } ?>
        <?php if(isset($cssValueArray['sidebar']['sidebar_seperator_color'])){ ?>
                .sidebar .block .actions
                {  border-color: <?php echo $cssValueArray['sidebar']['sidebar_seperator_color'];?>; }
        <?php } ?>

        <?php if(!$cssSettingValueArray['category']['sidebar_title_border_onoff']){ ?>
                .sidebar .block .block-title strong  {  border-bottom: none; padding-bottom: 0px;}
        <?php } ?>
        
/* Sidebar Ends */

/* product Starts */
        <?php if($cssSettingValueArray['product_list']['ajaxpopup'] == '0') {  ?>
                .alert{display: none !important;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['addtocart_color'])) {  ?>
                .products-grid .item button.button span,
                .products-list li.item button.button span,
                .product-view .product-shop button.button span
                {  color: <?php echo $cssValueArray['product_list']['addtocart_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['product_list']['addtocart_hover_color'])) {  ?>
                .products-grid .item button.button:hover span,
                .products-list li.item button.button:hover span,
                .product-view .product-shop button.button:hover span
                {  color: <?php echo $cssValueArray['product_list']['addtocart_hover_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['product_list']['addtocart_bg_color'])) {  ?>
                .products-grid .item button.button span,
                .products-list li.item button.button span,
                .product-view .product-shop button.button span
                {  background-color: <?php echo $cssValueArray['product_list']['addtocart_bg_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['product_list']['addtocart_hoverbg_color'])) {  ?>
                .products-grid .item button.button:hover span,
                .products-list li.item button.button:hover span,
                .product-view .product-shop button.button:hover span
                {  background-color: <?php echo $cssValueArray['product_list']['addtocart_hoverbg_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['product_list']['button_fonts'])) {  ?>
                .products-grid .item button.button,
                .products-list li.item button.button,
                .product-view .product-shop button.button
                {font-family: '<?php echo $cssValueArray['product_list']['button_fonts']; ?>';}
        <?php } ?>

        <?php if(isset($cssValueArray['product_list']['addtocart_seperator_color'])) {  ?>
                .products-grid div.btn-cart:after,
                .products-grid .divider
                {  background-color: <?php echo $cssValueArray['product_list']['addtocart_seperator_color'];?>;}
        <?php } ?>        
        
        <?php if(isset($cssValueArray['product_list']['product_content_bg'])) {  ?>
                .products-grid .item,
                .products-list li.item
                {  background-color: <?php echo $cssValueArray['product_list']['product_content_bg'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['product_hover_border_color'])) {  ?>
                .products-grid .item:hover,
                .products-list li.item:hover
                {  border-color: <?php echo $cssValueArray['product_list']['product_hover_border_color'];?>;}
        <?php } ?>         
            
        <?php if(isset($cssValueArray['product_list']['productname_color'])) {  ?>
                .products-grid .product-name a,
                .products-list .product-name a,
                .product-view .product-name h1
                {  color: <?php echo $cssValueArray['product_list']['productname_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['product_list']['productname_hover_color'])) {  ?>
               .products-grid .product-name a:hover,
               .products-list .product-name a:hover
                {  color: <?php echo $cssValueArray['product_list']['productname_hover_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['product_list']['productname_fonts'])) {  ?>
                .products-grid .product-name a,
                .products-list .product-name a,
                .product-view .product-name h1
                {font-family: '<?php echo $cssValueArray['product_list']['productname_fonts']; ?>';}
        <?php } ?>
             
        <?php if(isset($cssValueArray['product_list']['product_price_color'])) {  ?>
                .products-grid .price-box .price,
                .products-list .price-box .price,
                .product-view .product-shop .price-box .price
                {  color: <?php echo $cssValueArray['product_list']['product_price_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['product_list']['product_price_fonts'])) {  ?>
                    .products-grid .price-box .price,
                    .products-list .price-box,
                    .product-view .product-shop .price-box
                    {font-family: '<?php echo $cssValueArray['product_list']['product_price_fonts']; ?>';}
        <?php } ?>
         
        <?php if(isset($cssValueArray['product_list']['addto_color'])) {  ?>
                .products-grid .add-to-links li a,
                .products-list .add-to-links li a,
                .product-view .product-shop .add-to-links a
                {  color: <?php echo $cssValueArray['product_list']['addto_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['addto_hover_color'])) {  ?>
                .products-grid .add-to-links li a:hover,
                .products-list .add-to-links li a:hover,
                .product-view .product-shop .add-to-links a:hover
                {  color: <?php echo $cssValueArray['product_list']['addto_hover_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['product_list']['quickview_color'])) {  ?>
                .quick-view a
                {   color: <?php echo $cssValueArray['product_list']['quickview_color'];?>;}
        <?php } ?>    
            
        <?php if(isset($cssValueArray['product_list']['quickview_bg_color'])) {  ?>
                .quick-view a
                {   background-color: <?php echo $cssValueArray['product_list']['quickview_bg_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['product_list']['quickview_hover_color'])) {  ?>
                .quick-view a:hover
                {   color: <?php echo $cssValueArray['product_list']['quickview_hover_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['quickview_hover_bg_color'])) {  ?>
                .quick-view a:hover
                {   background-color: <?php echo $cssValueArray['product_list']['quickview_hover_bg_color'];?>;}
        <?php } ?>         
            
       <?php
            $shadowcolor3 = $cssValueArray['product_list']['product_shadow_color'];
            if (isset($shadowcolor3) && $shadowcolor3 != null){
            $hex3 =  $cssValueArray['product_list']['product_shadow_color']; 
            $val3 = $instance->html2rgb($hex3);
        
            $color = 'rgb('.$val3[0].','. $val3[1].','. $val3[2].')';
            $shadowcolor33 = $color;  
        
        ?>
            
            .products-grid .item,
            .products-list .item{
            box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -webkit-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -moz-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -ms-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -o-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            }
            .products-grid .item:hover,
            .products-list .item:hover{
            box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -webkit-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -moz-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -ms-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            -o-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor33 ?>;
            
            }
        <?php } ?>   
        
        <?php if($cssSettingValueArray['product_list']['product_shadow_enable'] == 'off') { ?>
                .products-grid .item,.products-grid .item:hover,
                .products-list .item,.products-list .item:hover{
                box-shadow:none;
                -webkit-box-shadow:none;
                -moz-box-shadow:none;
                -ms-box-shadow:none;
                -o-box-shadow:none;
                }
        <?php } elseif($cssSettingValueArray['product_list']['product_shadow_enable'] == 'onhover') { ?>
                .products-grid .item,
                .products-list .item{
                box-shadow:none;
                -webkit-box-shadow:none;
                -moz-box-shadow:none;
                -ms-box-shadow:none;
                -o-box-shadow:none;
                }
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['product_sliderarrow_color'])) {  ?>
                .products-grid .owl-theme .owl-controls .owl-buttons div
                {   color: <?php echo $cssValueArray['product_list']['product_sliderarrow_color'];?>;}
                
                .products-grid .owl-theme .owl-controls .owl-buttons div
                {   border-color: <?php echo $cssValueArray['product_list']['product_sliderarrow_color'];?>;}                
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['product_sliderarrow_hover_color'])) {  ?>
                .owl-theme .owl-controls .owl-buttons div:hover
                {   color: <?php echo $cssValueArray['product_list']['product_sliderarrow_hover_color'];?>;}
                
                .owl-theme .owl-controls .owl-buttons div:hover
                {   border-color: <?php echo $cssValueArray['product_list']['product_sliderarrow_hover_color'];?>;}                
                
        <?php } ?>
        
        <?php if(!$cssSettingValueArray['product_list']['product_hover_border_onoff']){ ?>
                .products-grid .item,
                .products-list .item{  border: none;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['new_label_color'])) {  ?>
                .new
                {   color: <?php echo $cssValueArray['product_list']['new_label_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['new_label_bg_color'])) {  ?>
                .new
                {   background-color: <?php echo $cssValueArray['product_list']['new_label_bg_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['sale_label_color'])) {  ?>
                .sale
                {   color: <?php echo $cssValueArray['product_list']['sale_label_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['product_list']['sale_label_bg_color'])) {  ?>
                .sale
                {   background-color: <?php echo $cssValueArray['product_list']['sale_label_bg_color'];?>;}
        <?php } ?>
        
        
        
/* product Ends */


/* Category Page Starts */
        <?php if(isset($cssValueArray['category']['toolbar_default_bg'])) {  ?>
                    .limiter .dropdown, .sort-by .dropdown
                    {  background-color: <?php echo $cssValueArray['category']['toolbar_default_bg'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['toolbar_hover_bg'])) {  ?>
                    .limiter .dropdown:hover, .sort-by .dropdown:hover
                    {  background-color: <?php echo $cssValueArray['category']['toolbar_hover_bg'];?>;}
        <?php } ?>        
            
        <?php if(isset($cssValueArray['category']['toolbar_default_color'])) {  ?>
                    .limiter .dropdown-toggle, .sort-by .dropdown-toggle
                    { color: <?php echo $cssValueArray['category']['toolbar_default_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['toolbar_hover_color'])) {  ?>
                    .limiter .dropdown:hover .dropdown-toggle, .sort-by  .dropdown:hover .dropdown-toggle
                    { color: <?php echo $cssValueArray['category']['toolbar_hover_color'];?>;}
        <?php } ?>         
        
        <?php if(isset($cssValueArray['category']['toolbar_link_color'])) {  ?>
                    .limiter .dropdown .dropdown-menu a, .sort-by .dropdown .dropdown-menu a
                    { color: <?php echo $cssValueArray['category']['toolbar_link_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['category']['toolbar_linkhover_color'])) {  ?>
                    .limiter .dropdown .dropdown-menu a:hover,
                    .sort-by .dropdown .dropdown-menu a:hover,
                    .limiter .dropdown .dropdown-menu a.selected,
                    .sort-by .dropdown .dropdown-menu a.selected
                    { color: <?php echo $cssValueArray['category']['toolbar_linkhover_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['toolbar_linkhover_bg_color'])) {  ?>
                   .limiter .dropdown .dropdown-menu a:hover, .sort-by .dropdown .dropdown-menu a:hover
                    { background-color: <?php echo $cssValueArray['category']['toolbar_linkhover_bg_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['toolbar_border_color'])) {  ?>
                    .limiter .dropdown, .sort-by .dropdown,
                    .limiter .dropdown .dropdown-menu, .sort-by .dropdown .dropdown-menu
                    { border-color: <?php echo $cssValueArray['category']['toolbar_border_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['pagination_color'])) {  ?>
                    .pager .pages li, .pager .pages li a
                    { color: <?php echo $cssValueArray['category']['pagination_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['pagination_hover_color'])) {  ?>
                    .pager .pages li:hover a, .pager .pages li.current a
                    { color: <?php echo $cssValueArray['category']['pagination_hover_color'];?>;}
        <?php } ?>                
        
        <?php if(isset($cssValueArray['category']['pagination_hover_bg_color'])) {  ?>
                    .pager .pages li:hover, .pager .pages li.current
                    { background-color: <?php echo $cssValueArray['category']['pagination_hover_bg_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['viewmode_fonts_color'])) {  ?>
                    .sorter .view-mode .grid, .sorter .view-mode .list
                    { color: <?php echo $cssValueArray['category']['viewmode_fonts_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['category']['viewmode_fonts_hover_color'])) {  ?>
                    .sorter .view-mode .grid:hover, .sorter .view-mode .list:hover,
                    .sorter .view-mode .grid.grid-mode-active, .sorter .view-mode .list.list-mode-active
                    { color: <?php echo $cssValueArray['category']['viewmode_fonts_hover_color'];?>;}
        <?php } ?>                        
        
/* Category Page Ends */


/* Footer Starts */
        <?php if(isset($cssValueArray['footer']['footer_background_color']) || isset($cssValueArray['footer']['footer_background_pattern'])) {
            $bg_color   = isset($cssValueArray['footer']['footer_background_color']) ? "background-color:".$cssValueArray['footer']['footer_background_color'].";": "";
            $bg_patern  = isset($cssValueArray['footer']['footer_background_pattern']) ? "background-image:url(".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'pattern/'.$cssValueArray['footer']['footer_background_pattern'].");": "";
        ?>		
                .footer-container
                    {
                        <?php echo $bg_color." ".$bg_patern;?>
                    }
        <?php } elseif(isset($cssValueArray['footer']['footer_background_image'])) { ?>    
            .footer-container          
            {
                    background-image: url(<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'custom/image/'.$cssValueArray['footer']['footer_background_image']; ?>);
                    background-attachment: <?php echo $cssValueArray['footer']['footer_background_attachment'];?>;
                    background-position: <?php echo $cssValueArray['footer']['footer_background_position_y'];?> <?php echo $cssValueArray['footer']['footer_background_position_x'];?>;
                    background-repeat: <?php echo $cssValueArray['footer']['footer_background_repeat'];?>;
                    
                    <?php if ($cssValueArray['footer']['footer_background_attachment']) { ?>
                            background-size: 100%;
                    <?php	} ?>
            }        
        <?php }?>    
        
        <?php if(isset($cssValueArray['footer']['footer_bottom_background_color'])) {  ?>
                .footer-bottom-container
                {  background-color: <?php echo $cssValueArray['footer']['footer_bottom_background_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['footer_bottom_color'])) {  ?>
                .footer-bottom-container
                {  color: <?php echo $cssValueArray['footer']['footer_bottom_color'];?>;}
        <?php } ?>        
        
        
        
        <?php if(isset($cssValueArray['footer']['footer_font_color'])) {  ?>
                .footer-container
                {  color: <?php echo $cssValueArray['footer']['footer_font_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['footer_link_color'])) {  ?>
                .footer-container a
                {  color: <?php echo $cssValueArray['footer']['footer_link_color'];?>;}
        <?php } ?>
            
        <?php if(isset($cssValueArray['footer']['footer_linkhover_color'])) {  ?>
                .footer-container a:hover
                {  color: <?php echo $cssValueArray['footer']['footer_linkhover_color'];?>;}   
        <?php } ?>
            
        <?php if(isset($cssValueArray['footer']['footer_link_title_color'])) {  ?>
               .footer-container .collapsible .block-title
                {  color: <?php echo $cssValueArray['footer']['footer_link_title_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['footer_border_color'])) {  ?>
                .footer-container ul.separator li a,
                .footer-container .collapsible .block-title,
                .footer-top-border,
                .footer-bottom-border
                {  border-color: <?php echo $cssValueArray['footer']['footer_border_color'];?>;}
                
                .footer-top .logo:after
                {  background-color: <?php echo $cssValueArray['footer']['footer_border_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['social_bg_color'])) {  ?>
                .social-link.icon-bg-color span.icon
                {  background-color: <?php echo $cssValueArray['footer']['social_bg_color'];?>;}
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['social_hoverbg_color'])) {  ?>
                .social-link.icon-bg-color span.icon:hover
                {  background-color: <?php echo $cssValueArray['footer']['social_hoverbg_color'];?>;}
                
        <?php } ?>        
        
        <?php if(isset($cssValueArray['footer']['social_font_color'])) {  ?>
                .social-link a .icon
                {  color: <?php echo $cssValueArray['footer']['social_font_color'];?>;}
                
        <?php } ?>
        
        <?php if(isset($cssValueArray['footer']['social_hoverfont_color'])) {  ?>
                .social-link a .icon:hover
                {  color: <?php echo $cssValueArray['footer']['social_hoverfont_color'];?> !important ;}
                
        <?php } ?>        
        
/* End Footer */

/* Extra Settings Starts */

        <?php $boxlayout = $cssSettingValueArray['extra_settings']['boxlayout']; ?>
        <?php $layoutwidth = $cssValueArray['layout']['layout_width']; ?>
        <?php $customwidth = $cssValueArray['layout']['custom_width']; ?>
        <?php if( $boxlayout == '1') { ?>
            <?php if($layoutwidth == 'custom'){ ?>
            .page,
            .nav-maincontainer.fixed{max-width:<?php echo $customwidth;?>px;}
            <?php } else { ?>
            .page,
            .nav-maincontainer.fixed{max-width:<?php echo $layoutwidth;?>px;}
            <?php } ?>
            .page { margin: 0 auto; width: 96%;
            box-shadow: 0px 0px 0px 10px #F5F5F5;
            -moz-box-shadow: 0px 0px 0px 10px #F5F5F5;
            -webkit-box-shadow: 0px 0px 0px 10px #F5F5F5;
            -ms-box-shadow: 0px 0px 0px 10px #F5F5F5;
            -o-box-shadow: 0px 0px 0px 10px #F5F5F5;
            border: 1px solid #D6D6D6;
            border-top:none;
            border-bottom:none;
            }
            .page{  background: <?php echo $cssValueArray['extra_settings']['boxlayout_bg'];?>;}
            .page{  border-color: <?php echo $cssValueArray['extra_settings']['boxlayout_border'];?>;}
            
            <?php
                 $shadowcolor4 = $cssValueArray['extra_settings']['boxlayout_shadow_color'];
                 if (isset($shadowcolor4) && $shadowcolor4 != null){
                 $hex4 =  $cssValueArray['extra_settings']['boxlayout_shadow_color']; 
                 $val4 = $instance->html2rgb($hex4);
             
                 $color = 'rgb('.$val4[0].','. $val4[1].','. $val4[2].')';
                 $shadowcolor44 = $color;  
             
             ?>
                 
                .page{
                 box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor44 ?>;
                 -webkit-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor44 ?>;
                 -moz-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor44 ?>;
                 -ms-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor44 ?>;
                 -o-box-shadow: 0px 0px 0px 10px <?php echo $shadowcolor44 ?>;
                 }
             <?php } ?>              
            
        <?php } ?>
            
        <?php if($boxlayout == '2') { ?>
            <?php if($layoutwidth == 'custom'){ ?>
            .page,
            .nav-maincontainer.fixed{max-width:<?php echo $customwidth;?>px;}
            <?php } else { ?>
            .page,
            .nav-maincontainer.fixed{max-width:<?php echo $layoutwidth;?>px;}
            <?php } ?>
            .page {margin: 0 auto; width: 96%;}
            .page{  background: <?php echo $cssValueArray['extra_settings']['boxlayout_bg'];?>;}
        <?php } ?>
        
        
        <?php if(isset($cssValueArray['extra_settings']['input_color'])) {  ?>
                input.input-text, select, textarea, input.product-custom-option
                {  color: <?php echo $cssValueArray['extra_settings']['input_color'];?>;}
        <?php } ?>

        <?php if(isset($cssValueArray['extra_settings']['input_hoverfocus_color'])) {  ?>
                input.input-text:hover, select:hover, textarea:hover, input.input-text:focus, select:focus, textarea:focus
                {  color: <?php echo $cssValueArray['extra_settings']['input_hoverfocus_color'];?>;}
        <?php } ?>                
        
        <?php if(isset($cssValueArray['extra_settings']['inputborder_color'])) {  ?>
                input.input-text, select, textarea, input.product-custom-option
                {  border-color: <?php echo $cssValueArray['extra_settings']['inputborder_color'];?>;}
        <?php } ?>
        
        <?php if(isset($cssValueArray['extra_settings']['input_hoverfocusborder_color'])) {  ?>
                input.input-text:hover, select:hover, textarea:hover, input.input-text:focus, select:focus, textarea:focus
                {  border-color: <?php echo $cssValueArray['extra_settings']['input_hoverfocusborder_color'];?>;}
        <?php } ?>        
        
/* Extra Settings Ends */



<?php if(Mage::helper("ExtraConfig")->is_mobile() == true) { ?>
        .cloud-zoom-lens,
        .cloud-zoom-big{display: none !important;}
<?php } ?>

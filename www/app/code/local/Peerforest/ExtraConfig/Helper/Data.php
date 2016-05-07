<?php 
class Peerforest_ExtraConfig_Helper_Data extends Mage_Core_Helper_Abstract
{
    
    function is_mobile()
    {
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	$mobiles = array("android", "iphone", "ipod", "ipad",
		"blackberry", "palm", "mobile", "mini", "kindle");
	foreach($mobiles as $mobile)
	{
		if(strpos($ua,$mobile)) return true;
	}
	return false;
    }
    
    public function responsivewidth()
	{
		return array(
			"1920" => 1760,
			"1680" => 1520,
			"1440" => 1380,
			"1360" => 1300,
			"1280" => 1200,
			"960" => 960,
		);
	}
	
    public function maxwidth($store)
	{
		$maxwidth = Mage::getStoreConfig('themelayout/layout/layout_width',$store);
		if ($maxwidth == 'custom')
		{
			return intval(Mage::getStoreConfig('themelayout/layout/custom_width', $store));
		}
		else
		{
			return intval($maxwidth);
		}
	}
	
    public function breakpoint($width, $store)
	{
		if ($width < 1280)
			$maxBreak = 960;
		elseif ($width < 1360)
			$maxBreak = 1280;
		elseif ($width < 1440)
			$maxBreak = 1360;
		elseif ($width < 1680)
			$maxBreak = 1440;
		elseif ($width < 1920)
			$maxBreak = 1680;
		else
			$maxBreak = 1920;
		
		return $maxBreak;
	}
	
    function jsString($str='')
    { 
        return trim(preg_replace("/('|\"|\r?\n)/", '', $str)); 
    }
    
    function html2rgb($rgb)
	 {
		  if ($rgb[0] == '#')
				$rgb = substr($rgb, 1);
	 
		  if (strlen($rgb) == 6)
				list($r, $g, $b) = array($rgb[0].$rgb[1],
												 $rgb[2].$rgb[3],
												 $rgb[4].$rgb[5]);
		  elseif (strlen($rgb) == 3)
				list($r, $g, $b) = array($rgb[0].$rgb[0], $rgb[1].$rgb[1], $rgb[2].$rgb[2]);
		  else
				return false;
	 
		  $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
	  
		  return array($r, $g, $b);
	 }
	 
    public function getAltImgHtml($product, $w, $h, $imgClass='small_image')
    {		  
       $enable = Mage::getStoreConfig('mygeneral/product_list/enable_alter');
	    $column = Mage::getStoreConfig('mygeneral/product_list/alter_image');
	    $value = Mage::getStoreConfig('mygeneral/product_list/alter_image_value');
	    $product->load('media_gallery');
	    
	    if($enable == 1)
	    {
			   foreach ($product->getMediaGalleryImages() as $image)
			   {		 
				     if($image->getLabel() == $value && $column == 'label')
				     {
						   $var= Mage::helper('catalog/image')->init($product, 'image', $image->getFile())->resize($w,$h);
						   return '<img class="'.$imgClass.'" src="' .$var. '" alt="' . $product->getName() . '" />';
				     }					  
				     elseif($image->getPosition() == $value && $column == 'sortorder')
				     {
						   $var= Mage::helper('catalog/image')->init($product, 'image', $image->getFile())->resize($w,$h);
						   return '<img class="'.$imgClass.'" src="' .$var. '" alt="' . $product->getName() . '" />';
				     }
			    }
	     }
	     return false;
    }	 

    
    public function categoryThemeSidebarMenu($category, $insObj, $level = 0)
    { 
	$isactive 	 = $insObj->isCategoryActive($category);
	$hasmoreChildren = $category->hasChildren();
	$active = "";
	if ($isactive) {
	    $active = "active";
	}
	
	$html  = "<li class='level".$level." ".$active."'>";
	$html .= "<a href='".$insObj->getCategoryUrl($category)."'>";
	$html .= "<span class='errow'></span>";
	$html .= "<span>".$category->getName()."</span>";
    if($category->getData('category_label')){
        $html .= "<span class='category-label'>".$category->getData('category_label')."</span>";
    }
	$html .= "</a>";
	
	if ($hasmoreChildren) {
	   if ($isactive) {
		$html .= "<a class='full right show-cat active' href='javascript://'><span class='plus fa fa-angle-right'></span><span class='minus fa fa-angle-down'></span></a>";
	    } else {
		$html .= "<a class='full right show-cat' href='javascript://'><span class='plus fa fa-angle-right'></span><span class='minus fa fa-angle-down'></span></a>";
	    }
	    
	    $html .= "<ul class='level".$level."'>";
	    
	    if (Mage::helper('catalog/category_flat')->isEnabled()) {
		$subCategory = $category->getChildrenCategories();
	    }
	    else {
		$subCategory = $category->getChildren();
	    }
	    $level++;
	    foreach ($subCategory as $subSubCategory) {
		$html .= $this->categoryThemeSidebarMenu($subSubCategory,$insObj,$level);
	    }	    
	    $html .= "</ul>";
	}
	$html .= "</li>";
	return $html;
    }
    
    public function sliderSetting()
    {
	$configData = Mage::getStoreConfig('mygeneral/product_slider');	
	return $this->sliderCustomSetting($configData);
    }
    
    public function bannerSliderSetting()
    {
	$configData = Mage::getStoreConfig('bannerslider/settings');	
	return $this->sliderCustomSetting($configData);
    }
    
    private function sliderCustomSetting($configData)
    {
	$html = "";
	
	if(isset($configData['slide_speed']) && $configData['slide_speed'] != "") {
	    $html .= ",slideSpeed: ". $configData['slide_speed'];
	}
	
	if(isset($configData['rewind_speed']) && $configData['rewind_speed'] != "") {	    
	    $html .= ",rewindSpeed: ". $configData['rewind_speed'];
	}
	
	if(isset($configData['auto_play']) && $configData['auto_play'] == "") {	    
	    $html .= ",autoPlay: false";
	}
	else if(isset($configData['auto_play']) && $configData['auto_play'] != "") {	    
	    $html .= ",autoPlay: ". $configData['auto_play'];
	}
	
	if(isset($configData['stop_on_hover']) && $configData['stop_on_hover'] == 0) {	    
	    $html .= ",stopOnHover: false";
	}
	else if(isset($configData['stop_on_hover']) && $configData['stop_on_hover'] == 1) {	    
	    $html .= ",stopOnHover: true";
	}
	
	if(isset($configData['rewind_nav']) && $configData['rewind_nav'] == 0) {	    
	    $html .= ",rewindNav: false";
	}
	else if(isset($configData['rewind_nav']) && $configData['rewind_nav'] == 1) {	    
	    $html .= ",rewindNav: true";
	}
	
	if(isset($configData['scroll_per_page']) && $configData['scroll_per_page'] == 0) {	    
	    $html .= ",scrollPerPage: false";
	}
	else if(isset($configData['scroll_per_page']) && $configData['scroll_per_page'] == 1) {	    
	    $html .= ",scrollPerPage: true";
	}
	
	if(isset($configData['transition_style']) && $configData['transition_style'] == "default") {
	    $html .= ',transitionStyle: false';
	}
	else if(isset($configData['transition_style']) && $configData['transition_style'] != "default") {
	    $html .= ',transitionStyle: "'. $configData['transition_style'].'"';
	}
	
	if(isset($configData['pagination']) && $configData['pagination'] == 0) {	    
	    $html .= ",pagination: false";
	}
	else if(isset($configData['pagination']) && $configData['pagination'] == 1) {	    
	    $html .= ",pagination: true";
	}
	
	if(isset($configData['pagination_speed']) && $configData['pagination_speed'] != "") {
	    $html .= ",paginationSpeed: ". $configData['pagination_speed'];
	}
	
	if(isset($configData['pagination_numbers']) && $configData['pagination_numbers'] == 0) {	    
	    $html .= ",paginationNumbers: false";
	}
	else if(isset($configData['pagination_numbers']) && $configData['pagination_numbers'] == 1) {	    
	    $html .= ",paginationNumbers: true";
	}
	
	return $html;
    }
    
    public function hoverCssAvaibility($id, $hover = 1){
	$fieldData = Mage::getStoreConfig('mygeneral/product_list/'.$id);	
	if($fieldData == 'on'){
	    return '';
	}
	if($fieldData == 'off'){
	    return 'off';
	}
	if($fieldData == 'onhover' && $hover == 1){
	    return 'display-onhover';
	}
	else {
	    return '';
	}
    }
}
?>
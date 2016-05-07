    j$('.ajx-cart').live('click', function () {
        if ( j$(window).width() < 769 )  {
            return false;
        }
        var cart = j$('.shopping_cart');
        var imgtodrag = j$(this).parents('li.item').find('a.product-image img:not(.back_img)').eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({ top:imgtodrag.offset().top, left:imgtodrag.offset().left })
                .css({'opacity':'0.5', 'position':'absolute', 'height':'150px', 'width':'150px', 'z-index':'1000'})
                .appendTo(j$('body'))
                .animate({
                    'top':cart.offset().top + 10,
                    'left':cart.offset().left + 30,
                    'width':55,
                    'height':55
                }, 1000, 'easeInOutExpo');
            imgclone.animate({'width':0, 'height':0}, function(){ j$(this).detach() });
        }
        return false;
    });

	
    j$('.fancybox').live('click', function() {
    
    
	$this = j$(this);
	j$.fancybox({
		       hideOnContentClick : true,
		       width: 700,
		       autoDimensions: true,
			type : 'iframe',
			href: $this.attr('href'),
		       showTitle: false,
		       scrolling: 'no',
		       onComplete: function(){
			    j$('#fancybox-loading').show();
			    j$('#fancybox-frame').load(function() { // wait for frame to load and then gets it's height
				    j$('#fancybox-loading').hide();
				    j$('#fancybox-content').height(j$(this).contents().find('body').height()+30);
				    j$.fancybox.resize();
			     });

		       }
	});
    return false;
    });
    
    function showOptions(id){
	    j$('#fancybox'+id).trigger('click');
    }
	
    
    function setAjaxData(data,iframe){
	    if(data.status == 'ERROR'){
		    alert(data.message);
	    }else{
		successMessage(data.message);
		    if(jQuery('.shopping_cart')){
		jQuery('.shopping_cart').replaceWith(data.sidebar);
	    }
	    if(jQuery('.header .links')){
		jQuery('.header .links').replaceWith(data.toplink);
	    }
	    jQuery.fancybox.close();
	    }
    }
    function setLocationAjax(url,id){
	    url += 'isAjax/1';
	    url = url.replace("checkout/cart","ajax/index");
	    jQuery('#ajax_loader'+id).show();
	    try {
		    jQuery.ajax( {
			    url : url,
			    dataType : 'json',
			    success : function(data) {				
				    jQuery('#ajax_loader'+id).hide();
			    setAjaxData(data,false);           
			    }
		    });
	    } catch (e) {
	    }
    }
    
    
    function setAjaxData1(data,iframe){
	    if(data.status == 'ERROR'){
		    alert(data.message);
	    }else{
		successMessage(data.message);
		    if(jQuery('.shopping_cart')){
		jQuery('.shopping_cart').replaceWith(data.sidebar);
	    }
	    if(jQuery('.header .links')){
		jQuery('.header .links').replaceWith(data.toplink);
	    }
	    jQuery.fancybox.close();
	    }
    }
    function setLocationAjax1(url,id){
	    url += 'isAjax/1';
	    url = url.replace("checkout/cart","ajax/index");
	    jQuery('#ajax_loader'+id).show();
	    try {
		    jQuery.ajax( {
			    url : url,
			    dataType : 'json',
			    success : function(data) {
				    jQuery('#ajax_loader'+id).hide();
			    setAjaxData1(data,false);           
			    }
		    });
	    } catch (e) {
	    }
    }
        
    function setLocationAjax3(url,id){
	url += '&isAjax=1';
	url = url.replace("checkout/cart","ajax/index");
	jQuery('#ajax_loader'+id).show();
	try {
	    jQuery.ajax( {
		url : url,
		dataType : 'json',
		success : function(data) {
		    
		    jQuery('#ajax_loader'+id).hide();
		successMessage(data.message);
	    if(jQuery('.shopping_cart')){
		jQuery('.shopping_cart').replaceWith(data.sidebar);
	    }
	    if(jQuery('.header .links')){
		jQuery('.header .links').replaceWith(data.toplink);
	    }
		
			       
		}
	    });
	} catch (e) {
	}
    }
    
    //decorateList('cart-sidebar', 'none-recursive');
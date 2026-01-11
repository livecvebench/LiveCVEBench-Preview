;jQuery(function($){
	
	$( '.admp_content .postbox .hndle' ).click( function() {
    	$( this ).next( '.inside' ).slideToggle();
    } );
    
    $('.my-color-field').wpColorPicker();
    
    $('.media_url_btn').click(function(e) {
        e.preventDefault();
		obj = $(this);
        var custom_uploader = wp.media({
            title: data.media_box_title,
            button: {
                text: data.media_btn_txt
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            obj.parent().find('.media_url_img').attr('src', attachment.url).show();;
            obj.parent().find('.media_url').val(attachment.url);

        })
        .open();
    });
    
    $( ".admin_menu_list, .admin_menu_list li ul" ).sortable();
    
    $('.admin_menu_list li .fa.fa-plus').click(function() {
    	$(this).closest('li').find('.menu_inner').slideToggle();
    });
    
    $( 'input[type=range]' ).each(function() {
    	$(this).change(function() {
    		$(this).next('span').text($(this).val());
    	});
    });
    
    $( 'input.toggle-radio' ).each(function() {
    	if( $(this).is(':checked') )
    		$(this).next('label').addClass('checked');
    		
    	$( this ).click(function() {
	    	var id = $(this).attr('id');
	    	$(this).closest('div').find('input').not('#'+id).next('label').removeClass('checked');
	    	$(this).next('label').addClass('checked');
	    });
    });
    
    $('#ext_url, #site_url').click(function() {
    	if( $('#ext_url').is(':checked') ){
    		$('#ext_url_link').removeAttr('disabled');
    	}else{
    		$('#ext_url_link').attr('disabled', 'disabled');
    	}
    });
    
    $('.qlinks a').click(function(e) {
    	e.preventDefault();
    	$('.qlinks_box').animate({
    		top: '100px'
    	}, 500);
    	return false;
    });
    
    $('.close_box').click(function(e){
    	e.preventDefault();
    	$('.qlinks_box').animate({
    		top: '-2000px'
    	}, 500);
    	return false;
    });
    
    
	
});

(function( $ ) {
 
    "use strict";

    $(document).ready( function(){
    	
    	$('.mailing-list-form').submit(function(event) {
    		event.preventDefault();
    		var data = {
				'action': 'fcbc_mailing_list',
				'email': $('.mailing-list-email').val()
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(fcbc.ajaxurl, data, function(response) {
				$('.mailing-list-form').html(response);
			});
    	});
    } ); 
 
})(jQuery);
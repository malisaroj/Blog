(function($){
	wp.customize("contacts_code", function(value) {
		value.bind(function(newval) {
			$(".footer-address").html(newval);
		} );
	});
})(jQuery);

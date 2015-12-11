(function($) {
	
	$(document).ready(function() {
		
		console.log('========== ENSICAEN Digital Booklet JS is ready ==========');
		
		$('#edb .item .accordion_title').click(function(e) {
			
			var elem   = $(this);
			
			elem.parent().toggleClass('active');
			
			e.preventDefault();
			e.stopImmediatePropagation();
			
		});
		
	});
	
})(jQuery);
(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function() {
	 	 $('#pay__submit').click(function(event) {
	 	 	event.preventDefault();
	 	 	$.post(
	 	 		'wp-admin/admin-ajax.php',
	 	 		{
	 	 			action: 'create_pay',
	 	 			name: $('#name').val(),
	 	 			email: $('#email').val(),
	 	 			tel: $('#tel').val(),
	 	 			amount: $('#price').val()
	 	 		}, 
	 	 		function(data, textStatus, xhr) {
	 	 		data = JSON.parse(data);
	 	 		$('#data').val(data['data']);
	 	 		$('#signature').val(data['signature']);
	 	 		$('.pay__form').submit();
	 	 	});
	 	 });
	 });

})( jQuery );

(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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

	 jQuery(document).ready(function ($) {

		var data = {
			'action': 'meta_box_ajax_response',
			'whatever': 1234
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function (response) {
			alert('Got this from the server: ' + response);
		});
	});
	 */
	$(document).ready(function () {
		// получаем язык wordpress через ajax
		var data = {
			'action': 'meta_box_ajax_response',
			'get_user_locale': 1, // значение не важно, главное не ноль
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function (response) {
			//alert('Got this from the server: ' + response);
			$.datetimepicker.setLocale(response);//установим язык в соответствии с ответом от ajax
		});

		jQuery('#datetimepicker').datetimepicker({
			startDate:'+1971/05/01',
		});

	})
})(jQuery);

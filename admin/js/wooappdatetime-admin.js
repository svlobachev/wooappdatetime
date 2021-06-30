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

	 $(document).ready(function () {
		$("#datepicker").datepicker().change(function () {
			var $this = $(this);
			var data = {
				json: JSON.stringify({
					array: [{ id: 1, text: "8 AM - 10 AM" }, { id: 2, text: "10 AM - 12 AM" }]
				}),
				delay: 0
			};
			$.ajax({
				url: "/echo/json/",
				data: data,
				type: "POST",
				success: function (response) {
					checkin(response);
				}
			});
		});
		function checkin(data) {
			var content = "";
			for (var arr = data.array, idx = 0; idx < arr.length; idx++) {
				content += "<tr class='text-center'><td colspan=7><button id=" + arr[idx].id + ">" + arr[idx].text + "</button></td></tr>";
			}
			$("#datepicker").find('.ui-datepicker-current-day').parent()
				.after(content);
		}

		$(".ui-state-default").on("mouseover", function () {
			var $this = $(this);
			var data = {
				json: JSON.stringify({
					count: "" + Math.floor((Math.random() * 10) + 1),
				}),
				delay: 0
			};
			$.ajax({
				url: "/echo/json/",
				data: data,
				type: "POST",
				success: function (response) {
					availability($this, response);
				}
			});
		});

		function availability($obj, data) {
			$obj.attr("title", data.count + " Available");
			$obj.data("toggle", "tooltip");
			$obj.tooltip();
		}
	})

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
		jQuery('#datetimepicker').datetimepicker();

	})
})(jQuery);

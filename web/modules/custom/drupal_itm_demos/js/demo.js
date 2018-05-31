(function ($, Drupal) {
	'use_restric';
	Drupal.behaviors.myBehavior = {
		attach: function (context, settings) {
			$('#accordion').accordion();
		}
	};
})(jQuery, Drupal);
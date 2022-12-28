(function($) {
    "use strict";
	$( "#mySlider" ).slider({
		range: true,
		min: 0,
		max: 9999,
		values: [ 0, 9999 ],
		slide: function( event, ui ) {
			$( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});

	$( "#price" ).val( "$" + $( "#mySlider" ).slider( "values", 0 ) +
			   " - $" + $( "#mySlider" ).slider( "values", 1 ) );

})(jQuery);
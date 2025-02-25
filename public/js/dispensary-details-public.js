jQuery(document).ready( function($) {
	if ($(".qty").attr("pattern") == '') {
		$(".qty").removeAttr("pattern");
	}
});
$(document).ready(function($) {
			
		$(".clickable").click(function() {
				window.document.location = $(this).data("href");
				print "idiot";
			});
});
	
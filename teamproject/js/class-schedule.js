$(document).ready(function(){
	$('.course-title').click( function() {
		var outer_this = $(this);
		var info = {};
		info.class_id = $(this).parent().prev().text();
		info.func_to_call = 'add_class_to_user_bucket';
		$.ajax({
		  url: site_abs + "standard/tp-ajax.php",
		  data: info,
		  dataType: 'json',
		}).done(function ( data ) {
		  if( console && console.log ) {
		    console.log("Debug:", data );
		  }
		  flip_to_pending( outer_this );
		})
		.fail(function(data) {console.log(data)});

		return false;
	});

	function flip_to_pending( href_to_flip ) {
		var current_text = href_to_flip.text();
		href_to_flip.replaceWith('<span class="pending">' + current_text + '</span>');
	}
});
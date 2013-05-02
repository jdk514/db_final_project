$(document).ready(function(){
	$('.add-course').click( function() {
		var outer_this = $(this);
		var info = {};
		info.class_id = $(this).parent().attr('id').replace('pending-course-id-', '');
		info.func_to_call = 'ajax_add_class_from_pending_to_active';
		add_class_url = site_abs + "standard/tp-ajax.php";
		$.ajax({
		  url: add_class_url,
		  data: info,
		  dataType: 'html',
		}).done(function ( data ) {
		  if( console && console.log ) {
		    console.log(data);
		  }
		  if( data.indexOf('Error:') !== -1 ) {
		  	alert_error(data);
		  } else {
		  	add_course_to_active( data, outer_this );
		  }
		})
		.fail(function(data) {console.log('Error: ', data)});

		return false;
	});

	$('#active-course-list, #pending-course-list').on('click', '.remove-course', function() {
		var outer_this = $(this);
		var info = {};
		info.class_id = $(this).parent().attr('id').replace(/pending-course-id-|active-course-id-/g, '');
		info.func_to_call = 'ajax_move_class_to_removed';
		$.ajax({
		  url: site_abs + "standard/tp-ajax.php",
		  data: info,
		  dataType: 'json',
		}).done(function ( data ) {
		  if( console && console.log ) {
		    console.log("Debug:", data );
		  }
		  remove_course( outer_this );
		})
		.fail(function(data) {console.log(data)});

		return false;
	});

	function alert_error( data ) {
		alert( data.toString() );
	}

	function add_course_to_active(li_html, clicked_link) {
		var li = li_html.replace('html:', '').replace(' ', '');
		$('#active-course-list').append($(li));
		clicked_link.parent().remove();
	}

	function remove_course( clicked_link ) {
		clicked_link.parent().remove();
	}
});
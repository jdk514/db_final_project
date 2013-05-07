<?php include_once '../../header.php'; 
global $tp_user;
get_active_courses( $tp_user->uid );
$active_year = get_option('active_year');
$active_semester = get_semester_name( get_option('active_semester') );

if( isset( $_POST['submit_for_approval'] ) )
	set_user_meta( $tp_user->uid, 'waiting_approval', '1' );
?>

<div id="manage-courses">
	<h2>Manage Courses</h2>

	<h4><?php echo $active_semester . ' Semester - ' . $active_year; ?></h4>
	<?php 
		$active_courses = user_active_courses( $tp_user->uid );
		echo '<ul id="active-course-list">';
		foreach( $active_courses as $course ) {
			echo '<li id="active-course-id-' . $course['cid'] . '">' . $course['title'] . ' - ' . $course['class_time'] . ' - ' . $course['class_day'] . ' - </span><a href="#" class="remove-course">remove</a></li>'; 
		}
		echo '</ul>';
	?>

	<hr />

	<h4> Pending Courses</h4>
	<?php
		$pending_courses = user_pending_courses( $tp_user->uid );
		echo '<ul id="pending-course-list">';
		foreach( $pending_courses as $course ) {
			echo '<li id="pending-course-id-' . $course['cid'] . '">' . $course['title'] . ' - ' . $course['class_time'] . ' - ' . $course['class_day'] . ' - <a href="#" class="add-course">add</a><span> | </span><a href="#" class="remove-course">remove</a></li>';
		}
		echo '</ul>';
	?>

	<hr />

	<h4> On Hold </h4>
	<?php 
		if( submitted_for_approval() ) {
			echo '<p style="color:red">Courses have been submitted for approval.</p>';
		}
	?>
	<?php
		$on_hold = courses_on_hold_or_approval( $tp_user->uid );
		echo '<ul id="hold-course-list">';
		foreach( $on_hold as $course ) {
			echo '<li id="hold-course-id-' . $course['cid'] . '">' . $course['title'] . ' - ' . $course['class_time'] . ' - ' . $course['class_day'] . ' - </span><a href="#" class="remove-course">remove</a></li>';
		}
		echo '</ul>';
	?>
	<?php if( !submitted_for_approval() ) { ?>
		<form action="" method="POST">
			<input type="submit" id="submit_approval" value="Submit For Approval" name="submit_for_approval" <?php if( empty( $on_hold ) ) { ?> style="display:none" <?php } ?> />
		</form>
	<?php } ?>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>
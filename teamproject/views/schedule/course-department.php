<?php 
include_once '../../header.php';
global $tp_user;

$classes = get_classes( array('dept_name' => $_GET['department'] ) );
$class_fields = array_keys( $classes[0] );
$structured_class_fields = array();
foreach( $class_fields as $field ) {
	if( $field == 'cid' || $field == 'cdid' || $field == 'dept_full_name' )
		continue;

	$field = ucwords( str_replace( '_', ' ', $field ) );
	$structured_class_fields[] = $field;
}

?>

<div id="schedule-main">
	<h3>Schedule for <?php echo $classes[0]['dept_full_name']; ?></h3>
	<table>
		<tr>
			<?php
				foreach( $structured_class_fields as $field_name ) {
					echo '<th>' . $field_name . '</th>';
				}
			?>
		</tr>
		<?php 
			foreach( $classes as $row ) {
				$prereqs = get_prereqs( $row['cid'] );
					echo '<tr>';
				foreach( $row as $field_name => $field_value ) {
					if( $field_name == 'cid' || $field_name == 'cdid' || $field_name == 'dept_full_name' )
						continue;
						
						if( $field_name == 'title' && user_has_course( $row['cid'], $tp_user->uid, 'pending' ) === 'pending' )
							echo '<td align="center"><span class="pending">' . $field_value . '</span></td>';
						else if( $field_name == 'title' && user_has_course( $row['cid'], $tp_user->uid, 'active' ) === 'active' )
							echo '<td align="center"><span class="active">' . $field_value . '</span></td>';
						else if( $field_name == 'title' && user_has_course( $row['cid'], $tp_user->uid, 'transcript' )  === 'transcript' )
							echo '<td align="center"><span class="transcript">' . $field_value . '</span></td>';
						else if( $field_name == 'title' && is_user_logged_in() && user_is_student() )
							echo '<td align="center"><a href="#" class="course-title">' . $field_value . '</a></td>';
						else
							echo '<td align="center">' . $field_value . '</a></td>';
				}
				echo '</tr>';
			}
		?>
	</table>
</div>

<?php include_once SITE_DIR . 'footer.php'; ?>
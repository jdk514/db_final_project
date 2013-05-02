<?php 
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
						
						if( !empty( $prereqs ) && $field_name == 'title')
							echo '<td align="center"><a href="#">' . $field_value . '</a></td>';
						else
							echo '<td align="center">' . $field_value . '</a></td>';
				}
				echo '</tr>';
			}
		?>
	</table>
</div>
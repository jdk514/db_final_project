<?php include_once '../../header.php';
	$year = get_option('active_year');
	$semester = get_option('active_semester');
 ?>
<div id="manage-site-options">
	<form action="" method="POST">
		<label for="current-semester">Current semester</label>
			<select id="current-semester" name="current_year" >
				<option value="2012" <?php if( $year == '2012') { echo "selected=selected"; }?> >2012</option>
				<option value="2013" <?php if( $year == '2013') { echo "selected=selected"; }?>>2013</option>
				<option value="2014" <?php if( $year == '2014') { echo "selected=selected"; }?>>2014</option>
			</select>

			<label for="current-year">Current year</label>
				<select id="current-semester" name="current_semester">
					<option value="1" <?php if( $semester == '1') { echo "selected=selected"; }?>>1</option>
					<option value="2" <?php if( $semester == '2') { echo "selected=selected"; }?>>2</option>
					<option value="3" <?php if( $semester == '3') { echo "selected=selected"; }?>>3</option>
				</select>
	<p><input type="submit" value="Submit" name="submit_active_information" /></p>
	</form>
</div>
<?php include_once SITE_DIR . 'footer.php'; ?>
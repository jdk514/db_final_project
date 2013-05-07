<?php
$active_semester = get_option( 'active_semester' );
$active_year = get_option( 'active_year' );
$sems_and_years = get_semesters_years();

foreach( $sems_and_years as $year => $sems ) {
		asort( $sems );
		echo '<div class="year-semester">';
			echo '<h3>' . $year . '</h3>';
			echo '<ul class="semesters">';
				foreach( $sems as $sem ) {
					switch( $sem ) {
						case 1:
							$sem_name = 'Spring';
						break;
						case 2:
							$sem_name = 'Summer';
						break;
						case 3:
							$sem_name = 'Fall';
						break;

					}
					if( $active_semester == $sem && $active_year == $year )
						echo '<li><a href="' . schedule_dir() .'course-list.php?year=' . $year . '&semester=' . $sem . '" id="active-semester">' . $sem_name . '</a></li>';
					else
						echo '<li>' . $sem_name . '</li>';
				}
			echo '</ul>';
		echo '</div>';
}

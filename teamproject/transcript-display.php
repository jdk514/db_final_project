<?php 

//display gpa
$gpa = get_gpa($user_id);

echo 'GPA: '.$gpa['gpa'].'<br />';

//display courses taken

$courses_taken = get_courses_taken( $user_id );

foreach ($courses_taken as $course) {
	echo $course["title"];
}


?>


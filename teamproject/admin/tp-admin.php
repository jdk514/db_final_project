<?php

//login and logout variables

if( isset( $_POST['login'] ) ) 
	init_user_login( $_POST['username'], $_POST['user_pass'] );

if( isset( $_GET['logout'] ) )
	logout_user();

//registration variables

if( isset( $_POST['submit_active_information'] ) ) {
	set_option( 'active_year', $_POST['current_year'] );
	set_option( 'active_semester', $_POST['current_semester'] );
}

if( isset( $_POST['delete_courses'] ) )
	delete_courses();

if( isset( $_POST['change_grades'] ) )
	change_grades();

if( isset( $_POST['add_course'] ) )
	add_course();

//functions to show login form and initialize user login

function show_login_form() {
 ?>
	<h3>Login</h3>
	<form action="" method="POST">
		<p>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" />
		</p>
		<p>
			<label for="user_pass">Password: </label>
			<input type="password" id="user_pass" name="user_pass" />
		</p>
		<input type="submit" value="Submit" name="login" />
	</form>
<?php 
}

function init_user_login( $username, $login ) {
	global $tp_query;

	get_and_add_new_users_app();

	if( !isset( $username ) || !isset( $login ) ) {
		$_SESSION['login_error'] = 'Please enter a username and password.';
		return;
	}

	$query = "SELECT uid, user_pass, user_email, user_name, fname, lname, date_registered, role_id  FROM tp_users WHERE user_name = '$username'";
	$user_info = $tp_query->query( $query );
	$user_info = $user_info[0];
	
	if( empty( $user_info ) ) {
		$_SESSION['login_error'] = 'User does not exist.';
		return;
	}

	if( $login !== $user_info['user_pass'] ) {
		$_SESSION['login_error'] = 'Incorrect username or password.';
		return;
	}

	$_SESSION['user_login'] = $user_info['uid'];
	unset( $_SESSION['login_error'] );

	create_user( $user_info['uid'] );
}

//function to welcome user
function welcome_user() {
	global $tp_user;
	echo 'Welcome, <br /><p id="user-bold-name"><strong>' . $tp_user->fname . ' ' . $tp_user->lname . '</strong></p>';

}

//function to logout user
function logout_user() {
	if( isset( $_SESSION['user_login'] ) ) {
		unset( $_SESSION['user_login'] );
	}
	header( 'Location: ' . SITE_ABS );
}


//functions to display links for user

function show_user_links() {
	global $tp_user;
	$current_role_info = get_role_info( $tp_user->role_id );
	echo '<em>' . $current_role_info['role_full_name'] . '</em>';
	echo '<ul id="user-info">';
	echo '<li><a href="' . SITE_ABS . '/index.php?logout">Logout</a>';
	//echo '<li><a href="/user-info.php">Manage profile</a>';
	switch( $current_role_info["rid"] ) {
		case "1":
			echo '<li><a href="' . SITE_ABS . 'views/course_management/course-management.php">Manage schedule</a>';
			echo '<li><a href="' . SITE_ABS . 'views/transcript/transcript.php">Transcript</a></li>';
		break;
		case "3":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/courses-teaching.php">Manage grades</a>';
		break;
		case "4":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/site-info.php">Site info</a>';
		break;
		case "2":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/manage-students.php">Manage students</a>';
		break;

	}
	echo '</ul>';

}

function show_user_top_links() {
	global $tp_user;
	$current_role_info = get_role_info( $tp_user->role_id );
	//echo '<li><a href="/user-info.php">Manage profile</a>';
	switch( $current_role_info["rid"] ) {
		case "1":
			echo '<li><a href="' . SITE_ABS . 'views/course_management/course-management.php">Manage schedule</a>';
			echo '<li><a href="' . SITE_ABS . 'views/transcript/transcript.php">Transcript</a></li>';
		break;
		case "3":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/courses-teaching.php">Manage grades</a>';
		break;
		case "4":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/site-info.php">Site info</a>';
		break;
		case "2":
			echo '<li><a href="' . SITE_ABS . 'views/course_admin/manage-students.php">Manage students</a>';
		break;

	}
	echo '<li><a href="' . SITE_ABS . '/index.php?logout">Logout</a>';
	echo '</ul>';
}

//function to get info of all students
function get_all_students_info() {
	global $tp_query;
	//First get all students
	$query = "SELECT course_id, course_num, title, semester, year, user_id, tp_course_being_taken.status FROM tp_course_being_taken,tp_course 
					WHERE user_id = ANY( SELECT uid FROM tp_users WHERE role_id = 1 ) 
					AND course_id = cid;";
	$classes = $tp_query->query( $query );
	foreach( $classes as $class ) {
		if ( $class['status'] != 'transcript' && $class['status'] != 'active') {
			if( !array_key_exists( $class['user_id'], $users ) ) {
				$users[$class['user_id']] = array();
				continue;
			}
		}

		if( !array_key_exists( $class['user_id'], $users ) ) {
			if( $class['status'] == 'transcript' )
				$new_class = array( 'transcript' => array( $class ), 'active' => array() );
			else if( $class['status'] == 'active' )
				$new_class = array( 'active' => array( $class ), 'transcript' => array() );
			else
				continue;
			$user = $new_class;
			$user_id = $class['user_id'];
			$users[$user_id] = $user;
		} else {
			$user = $users[$class['user_id']];
			$status = $class['status'];
			$user[$status][] = $class;
			$user_id = $class['user_id'];
			$users[$user_id] = $user;
		}
	}
	return $users;
}

//funtion to get info for one student
function get_student_info( $user_id ) {
	global $tp_query; 
	$query = "SELECT * FROM tp_users WHERE uid = $user_id;";
	$user = $tp_query->query( $query );
	return $user[0];
}

//function to delete courses
function delete_courses() {
	global $tp_query;

	$courses_to_delete = $_POST['course_to_delete'];
	foreach( $courses_to_delete as $course_info ) {
		$course = explode('-', $course_info);
		$course_id = $course[0];
		$course_sem = $course[1];
		$course_year = $course[2];
		$user_id = $_POST['user_id'];

		$query = "UPDATE tp_course_being_taken SET status='removed' WHERE user_id = $user_id;";
		$tp_query->query( $query );

		$query = "DELETE FROM tp_transcript_courses WHERE course_id = $course_id 
					AND transcript_id = ANY(SELECT tid FROM tp_transcript WHERE user_id = $user_id);";
		$tp_query->query( $query );
	}
}

function change_grades() {
	global $tp_query;

	$courses_to_change = $_POST['course_to_delete'];

	foreach( $courses_to_change as $course_info ) {
		$course = explode('-', $course_info);
		$course_id = $course[0];
		$course_sem = $course[1];
		$course_year = $course[2];
		$user_id = $_POST['user_id'];
		$course_grade = $_POST['course_grade'];

		$query = "UPDATE tp_course_being_taken SET status='transcript' WHERE user_id = $user_id;";
		$tp_query->query( $query );

		/*$query = "SELECT tid FROM tp_transcript WHERE user_id = $user_id;";
		$transcript_id = $tp_query->query( $query );

		$transcript_id = $transcript_id[0]['tid'];*/
		$check_query = "SELECT transcript_id FROM tp_transcript_courses WHERE course_id = $course_id AND user_id = $user_id;";
		$already_has_class = $tp_query->query( $check_query );

		if( !empty($already_has_class[0] ) ) {
			$query = "UPDATE tp_transcript_courses SET course_grade = '$course_grade' WHERE user_id = $user_id AND course_id = $course_id;";
		} else {
			$query = "INSERT INTO tp_transcript_courses (transcript_id, course_id, course_grade, course_semester, course_year, user_id) 
					VALUES($transcript_id, $course_id, '$course_grade', $course_sem, $course_year, $user_id);";
		}
		$tp_query->query( $query );
	}
}

//This function retrieves new users from the Application process
function get_and_add_new_users_app() {
	global $tp_query; 

	$query = "SELECT * FROM app_to_reg;";

	if( !SINGLE ) {
		$tpapp_query = new TP_Query( 'jdk514', 's3cr3t201e', 'jdk514' );
		$tpapp_query->connect();

		$all_new_users = $tpapp_query->query( $query );
	} else {
		$all_new_users = $tp_query->query( $query );
	}

	foreach( $all_new_users as $new_user ) {
		$fname = $new_user['firstname'];
		$lname = $new_user['lastname'];
		$email = $new_user['email'];
		$pass = $new_user['loginpassword'];
		//$user_name = $new_user['studentid'];
		$user_name = strtolower( substr( $new_user['firstname'], 0, 1 ) );
		$user_name .= strtolower( $new_user['lastname'] );
		//This is not really useful yet.
		$degree_sough = $new_user['dsought'];

		$query = "SELECT * FROM tp_users WHERE user_pass = '$pass';";

		$has_user = $tp_query->query( $query );
		if( !empty( $has_user ) )
			continue;

		//Check if username exists
		$query = "SELECT COUNT(*) FROM tp_users WHERE user_name LIKE '%$user_name%'";
		$number = (int)array_shift(array_shift($tp_query->query($query)));
		
		if( $number == 0 )
			$query = "INSERT INTO tp_users (address_id, fname, lname, user_name, user_pass, user_email, role_id) VALUES (1, '$fname', '$lname', '$user_name', '$pass', '$email', 1 );";
		else {
			$user_name = $user_name . $number;
			$query = "INSERT INTO tp_users (address_id, fname, lname, user_name, user_pass, user_email, role_id) VALUES (1, '$fname', '$lname', '$user_name', '$pass', '$email', 1 );";
		}

		$tp_query->query( $query );

		$query = "SELECT uid FROM tp_users WHERE user_name = '$user_name'";
		$user_id = $tp_query->query( $query );

		$user_id = $user_id[0]['uid'];

		$query = "INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES ($user_id, 'course_hold', '1');";
		$tp_query->query( $query );
	}

}

//function to add a course
/*function add_course() {
	global $tp_query;

	$course_to_add_num = $_POST['course_num'];
	$course_to_add_sem = $_POST['course_sem'];
	$course_to_add_year = $_POST['course_year'];
	$course_to_add_type = $_POST['course_type'];
	$course_to_add_grade = $_POST['course_grade'];
	$user_id = $_POST['user_id'];

	if( empty( $course_to_add_num ) || empty( $course_to_add_sem ) || empty( $course_to_add_year) ) {
		return;
	}

	if( $course_to_add_type == 'transcript' && empty( $course_to_add_grade ) )
		return;

	if ( !empty( $course_to_add ) && $course_to_add_type != 'transcript' )
		return;

	//Get course ID
	$query = "SELECT cid FROM tp_course WHERE course_num = $course_to_add_num AND semester = $course_to_add_sem AND year = $course_to_add_year;";
	$course = $tp_query->query( $query );
	if( !isset($course[0]) || empty( $course[0]))
		return;

	$course_id = $course[0]['cid'];

	//Check if student takes course
	$query = "SELECT * FROM tp_course_being_taken WHERE course_id = $course_id;";
	$taking_course = $tp_query->query( $query );
	if( isset($taking_course[0]) && !empty( $taking_course[0])) {
		if( $course_to_add_type != 'transcript' ) {
			$query = "UPDATE tp_course_being_taken SET status=$course_to_add_type WHERE course_id = $course_id AND user_id = $user_id;";
			$tp_query->query( $query );
		} else {
			$query = "UPDATE tp_course_being_taken SET status=$course_to_add_type WHERE course_id = $course_id AND user_id = $user_id;";
			$tp_query->query( $query );

			$query = "SELECT tid FROM tp_transcript WHERE user_id = $user_id;";
			$tid = $tp_query->query( $query );
			$tid = $tid[0]['tid'];

			$query = "INSERT INTO tp_transcript_courses(transcript_id, course_id, course_grade, course_semester, course_year) 
						VALUES ($tid, $course_id, $course_to_add_grade, $course_to_add_sem, $course_to_add_year;";
			$tp_query->query( $query );
		}
	}

	$query = "INSERT INTO tp_course_being_taken(user_id, course_id, status) VALUES ($user_id, $course_id, '$course_to_add_type');";
	$tp_query->query( $query );
}

*/
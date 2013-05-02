<?php

/* Test data */

$setup_data = array (
	'tp_course_dept' =>
		array(
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6221', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6461', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6212', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6225', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6232', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6233', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6241', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6242', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6246', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6251', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6254', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6260', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6262', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6283', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6284', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6286', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6325', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6339', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '684', 'Computer Science');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'EE', '6243', 'Electrical Engineering');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'EE', '6244', 'Electrical Engineering');",
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'Math', '6210', 'Mathematics');",
		),
	'tp_course' => 
 		array(
	 			 		"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (1, 1, 'Software Paradigms', 3, 'M', '3-5:30pm', 2, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (2, 2, 'Computer Architecture', 3, 'T', '3-5:30pm', 2, '2013', 'Closed');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (3, 3, 'Algorithms', 3, 'W', '3-5:30pm', 3, '2013', 'Closed');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (4, 4, 'Data Compression', 3, 'R', '3-5:30pm', 3, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (5, 5, 'Networks 1', 3, 'M', '6-8:30pm', 2, '2014', 'Suspended');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (6, 6, 'Networks 2', 3, 'T', '6-8:30pm', 3, '2014', 'Closed');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (7, 7, 'Database 1', 3, 'W', '6-8:30pm', 2, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (8, 8, 'Database 2', 3, 'R', '6-8:30pm', 3, '2013', 'Open ');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (9, 9, 'Compilers', 3, 'T', '3-5:30pm', 3, '2013', 'Open ');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (10, 10, 'Distributed Systems', 3, 'M', '6-8:30pm', 3, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (11, 11, 'Software Engineering', 3, 'M', '3-5:30pm', 1, '2014', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (12, 12, 'Multimedia', 3, 'R', '6-8:30pm', 1, '2014', 'Suspended');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (13, 13, 'Graphics 1', 3, 'W', '6-8:30pm', 2, '2013', 'Closed');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (14, 14, 'Security 1', 3, 'T', '6-8:30pm', 3, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (15, 15, 'Cryptography', 3, 'M', '6-8:30pm', 3, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (16, 16, 'Network Security', 3, 'W', '6-8:30pm', 1, '2014', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (17, 17, 'Advanced Algorithms', 2, 'R', '4-6:30pm', 1, '2014', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (18, 18, 'Embedded Systems', 2, 'T', '3-5:30pm', 2, '2013', 'Closed');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (19, 19, 'Advanced Crypto', 3, 'W', '4-6:30pm', 2, '2014', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (20, 20, 'Communication Systems', 3, 'M', '6-8:30pm', 2, '2014', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (21, 21, 'Information Theory', 2, 'T', '6-8:30pm', 3, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (22, 22, 'Logic', 2, 'W', '6-8:30pm', 2, '2013', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, semester, year, status) VALUES (23, 22, 'Logic', 2, 'W', '6:15-8:30pm', 2, '2013', 'Open');",
	),
	'tp_roles' =>
		array(
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (1, 'graduate_student', 'Graduate Student');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (2, 'graduate_secretary', 'Graduate Secretary');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (3, 'professor', 'Professor');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (4, 'system_admin', 'System Admin');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (5, 'faculty_advisor', 'Faculty Advisor');",
		),
	'tp_addresses' =>
		array(
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (1, 1, '1 1st Street', NULL, 'NY', '10956', 'New City)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (2, 2, '2 2nd Street', NULL, 'CT', '06614', 'Stafford)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (3, 3, '3 3rd Street', NULL, 'PA', '39433', 'Shamokin)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (4, 4, '939 Artwood Road', NULL, 'GA', '43243', 'Atlanta)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (5, 5, '684 Dorian Road', NULL, 'NJ', '07883', 'Westfield)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (6, 6, '1 CompSci Lane', NULL, 'MD', '27809', 'Potomac)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (7, 7, '9 Pine Avenue', NULL, 'TN', '65229', 'Oak Ridge)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (8, 8, '4207 Reservoir Road', NULL, 'DC', '20037', 'Washington)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (9, 9, '1900 F Street', 'Thurston Hall', 'DC', '20052', 'Washington)');",
			"INSERT INTO tp_address (aid, user_id, street1, street2, state_prov, zipcode, city) VALUES (10, 10, '5 South Street', NULL, 'AL', '85907', 'Triangle Park');",
		),
	'tp_users' =>
		array(
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (1, 1, 'Ross', 'Weisman', 'weisman', 'password1', 'weisman@gwu.edu', '2012-05-26', 1) ;",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (2, 2, 'Jacob', 'Raccuia', 'raccuia', 'monkey', 'raccuia@gwu.edu', '2012-05-25', 1);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (3, 3, 'Mike', 'Kozar', 'kozar', 'tubesteak', 'kozar@gwu.edu', '2012-05-24', 2);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (4, 4, 'Chris', 'Kocher', 'kocher', 'oldmanhands', 'kocher@gwu.edu', '2012-05-23', 1);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (5, 5, 'Jeffery Joseph', 'DeSorbo', 'desorbo', '200%', 'desorbo@gwu.edu', '2012-05-22', 1)  ;",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (6, 6, 'Bhagi', 'Narahari', 'narahari', 'goldennugget', 'narahari@gwu.edu', '2012-05-21', 3);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (7, 7, 'Evan', 'Drumwright', 'drum', 'tennessee',  'dum@gwu.edu', '2012-05-03', 3);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (8, 8, 'Gabe', 'Parmer', 'parmer', 'systems', 'parmer@gwu.edu', '2012-05-05', 5);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (9, 9, 'Steven', 'Knapp', 'knapp', 'money', 'knapp@gwu.edu', '2012-05-06', 4);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (10, 10, 'Shahar', 'Abrams', 'abrams', 'heat', 'abrams@gwu.edu', '2012-03-21', 1);",
		),
	/*'tp_transcript' =>
		array(
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (1, 3.2);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (2, 3.5);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (3, 2.4);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (4, 2.39);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (5, 2.34);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (6, 3.67);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (7, 3.67);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (8, 3.67);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (9, 4.0);",
			"INSERT INTO tp_transcript (user_id, gpa) VALUES (10, 5.0);",
		),*/
	'tp_transcript_courses' =>
		array(
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 2, 'A', 1, 2013 );",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 2, 'A-', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 4, 'B', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 2, 'C', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 4, 'D', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 6, 'A', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 5, 'D', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 4, 'E', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 2, 'F', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (5, 3, 'A', 1, 2013);",
		),
	'tp_course_being_taken' =>
		array(
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (1, 1, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (2, 2, 4, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (3, 3, 7, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (4, 4, 8, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (5, 5, 9, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, status) VALUES (10, 10, 10, 'active');",
		),
	'tp_users_meta' =>
		array(
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (1, 1, 'nickname', 'Captain Awesome');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (2, 2, 'nickname', 'Mr. Tumnus');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (3, 3, 'nickname', 'Cheez-it');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (4, 4, 'nickname', 'Tim');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (5, 5, 'nickname', 'Britney');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (6, 6, 'nickname', 'Prof. Narahari');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (7, 7, 'nickname', 'Prof. Drumwright');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (8, 8, 'nickname', 'Prof. Parmer');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (9, 9, 'nickname', 'President Knapp');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (10, 10, 'nickname', 'Wa-Luigi');",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (6, 'teaching_course', 1);",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (6, 'teaching_course', 2);",
			"INSERT INTO tp_users_meta(useR_id, meta_key, meta_val) VALUES (7, 'teaching_course', 3);",
		),
	'tp_course_has_prereqs' =>
		array(
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (6, 5);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (8, 7);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (9, 2);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (9, 3);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (11, 1);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (10, 2);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (11, 1);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (14, 3);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (16, 14);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (16, 5);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (15, 3);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (17, 3);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (18, 2);",
			"INSERT INTO tp_course_has_prereqs (course_id, prereq_id) VALUES (18, 3);",
		),
	'tp_degree' =>
		array(
			"INSERT INTO tp_degree (degree_type, college, name) VALUES ('Masters of Science', 'Science and Engineering School', 'Computer Science');",
		),
	'tp_degree_being_sought' =>
		array(
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 1);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 2);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 3);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 4);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 5);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 6);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 7);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 8);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 9);",
			"INSERT INTO tp_degree_being_sought (degree_id, user_id) VALUES (1, 10);",
		),
	'tp_site_options' =>
		array(
			"INSERT INTO tp_site_options (option_key, option_value) VALUES ('active_semester', 2);",
			"INSERT INTO tp_site_options (option_key, option_value) VALUES ('active_year', 2013);",
		),
);





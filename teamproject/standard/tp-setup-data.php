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
			"INSERT INTO tp_course_dept(dept_name, dept_num, dept_full_name) VALUES ( 'CS', '6220', 'Computer Science');",
		),
	'tp_course' => 
 		array(
	 		"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (1, 1, 'Software Paradigms', 3, 'M', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (2, 2, 'Computer Architecture', 3, 'T', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (3, 3, 'Algorithms', 3, 'W', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (4, 4, 'Data Compression', 3, 'R', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (5, 5, 'Networks 1', 3, 'M', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (6, 6, 'Networks 2', 3, 'T', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (7, 7, 'Database 1', 3, 'W', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (8, 8, 'Database 2', 3, 'R', '6-8:30pm', 'Open ');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (9, 9, 'Compilers', 3, 'T', '3-5:30pm', 'Open ');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (10, 10, 'Distributed Systems', 3, 'M', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (11, 11, 'Software Engineering', 3, 'M', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (12, 12, 'Multimedia', 3, 'R', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (13, 13, 'Graphics 1', 3, 'W', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (14, 14, 'Security 1', 3, 'T', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (15, 15, 'Cryptography', 3, 'M', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (16, 16, 'Network Security', 3, 'W', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (17, 17, 'Advanced Algorithms', 2, 'R', '4-6:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (18, 18, 'Embedded Systems', 2, 'T', '3-5:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (19, 19, 'Advanced Crypto', 3, 'W', '4-6:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (20, 20, 'Communication Systems', 3, 'M', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (21, 21, 'Information Theory', 2, 'T', '6-8:30pm', 'Open');",
			//"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (22, 22, 'Logic', 2, 'W', '6-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (22, 22, 'Logic', 2, 'W', '6:15-8:30pm', 'Open');",
			"INSERT INTO tp_course (cid, course_num, title, credits, class_day, class_time, status) VALUES (23, 23, 'Imaginary Course', 2, 'W', '6:15-8:30pm', 'Open');",
	),
	'tp_roles' =>
		array(
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (1, 'graduate_student', 'Graduate Student');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (2, 'graduate_secretary', 'Graduate Secretary');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (3, 'professor', 'Professor');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (4, 'system_admin', 'System Admin');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (5, 'faculty_advisor', 'Faculty Advisor');",
			"INSERT INTO tp_roles (rid, role_name, role_full_name) VALUES (6, 'alumni', 'Alumni');"
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
			"INSERT INTO tp_users(uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES( 1, 1, 'Paul', 'McCartney', 'pmccartney', 'pass', 'pmccartney@gwu.edu', '2013-05-06', 1 );",
			"INSERT INTO tp_users(uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES( 2, 2, 'George', 'Harrison', 'gharrison', 'pass', 'gharrison@gwu.edu', '2013-05-06', 1 );",
			/*"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (1, 1, 'Ross', 'Weisman', 'weisman', 'password1', 'weisman@gwu.edu', '2012-05-26', 1) ;",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (2, 2, 'Jacob', 'Raccuia', 'raccuia', 'monkey', 'raccuia@gwu.edu', '2012-05-25', 1);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (3, 3, 'Mike', 'Kozar', 'kozar', 'tubesteak', 'kozar@gwu.edu', '2012-05-24', 2);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (4, 4, 'Chris', 'Kocher', 'kocher', 'oldmanhands', 'kocher@gwu.edu', '2012-05-23', 1);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (5, 5, 'Jeffery Joseph', 'DeSorbo', 'desorbo', '200%', 'desorbo@gwu.edu', '2012-05-22', 1)  ;",*/
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (3, 6, 'Bhagi', 'Narahari', 'narahari', 'goldennugget', 'narahari@gwu.edu', '2012-05-21', 3);",
			"INSERT INTO tp_users(uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES( 4, 5, 'Eric', 'Clapton', 'eclapton', 'pass', 'eclapton@gwu.edu', '2005-01-01', 6 );",
			"INSERT INTO tp_users(uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES( 5, 3, 'Test', 'Test', 'test', 'test', 'test@gwu.edu', '2005-01-01', 1 );",
			"INSERT INTO tp_users(uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES( 6, 4, 'TestTwo', 'Test', 'testtwo', 'testtwo', 'test@gwu.edu', '2005-01-01', 1 );"
			/*"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (7, 7, 'Evan', 'Drumwright', 'drum', 'tennessee',  'dum@gwu.edu', '2012-05-03', 3);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (8, 8, 'Gabe', 'Parmer', 'parmer', 'systems', 'parmer@gwu.edu', '2012-05-05', 5);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (9, 9, 'Steven', 'Knapp', 'knapp', 'money', 'knapp@gwu.edu', '2012-05-06', 4);",
			"INSERT INTO tp_users (uid, address_id, fname, lname, user_name, user_pass, user_email, date_registered, role_id) VALUES (10, 10, 'Shahar', 'Abrams', 'abrams', 'heat', 'abrams@gwu.edu', '2012-03-21', 1);",*/
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
			/*"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 2, 'A', 1, 2013 );",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 2, 'A-', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 4, 'B', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 2, 'C', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 4, 'D', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 6, 'A', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 5, 'D', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 4, 'E', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (4, 2, 'F', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (5, 3, 'A', 1, 2013);",*/
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 1, 'A', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 2, 'A', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 3, 'A', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 5, 'A', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 6, 'A', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 7, 'B', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 9, 'B', 3, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 13, 'B', 3, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 14, 'B', 3, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (1, 23, 'B', 1, 2014);", // End McCartney
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 1, 'B', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 2, 'B', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 3, 'B', 1, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 5, 'B', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 6, 'B', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 7, 'B', 2, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 8, 'B', 3, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 21, 'C', 3, 2013);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (2, 14, 'B', 3, 2013);", // End Harrison
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 1, 'B', 1, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 2, 'B', 1, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 3, 'B', 1, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 5, 'B', 2, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 6, 'B', 2, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 7, 'B', 2, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 8, 'B', 3, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 14, 'A', 3, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 16, 'A', 3, 2005);",
			"INSERT INTO tp_transcript_courses (user_id, course_id, course_grade, course_semester, course_year) VALUES (3, 11, 'A', 1, 2006);", // End Clapton
		),
	'tp_course_being_taken' =>
		array(
			/*"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (1, 1, 1, 2013, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (2, 2, 4, 2013, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (3, 3, 7, 2013, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (4, 4, 8, 2013, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (5, 5, 9, 2013, 1, 'active');",
			"INSERT INTO tp_course_being_taken (cbtid, user_id, course_id, year, semester, status) VALUES (10, 10, 10, 2013, 1, 'active');",*/
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 1, 2013, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 2, 2013, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 3, 2013, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 23, 2014, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 5, 2013, 2, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 6, 2013, 2, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 7, 2013, 2, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 9, 2013, 3, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 13, 2013, 3, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 1, 14, 2013, 3, 'transcript');", //End McCartney
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 1, 2013, 1, 'transcript');", //6221
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 2, 2013, 1, 'transcript');", //6241
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 3, 2013, 1, 'transcript');", //6212
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 5, 2013, 2, 'transcript');", //6232
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 6, 2013, 2, 'transcript');", //6233
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 7, 2013, 2, 'transcript');", //6241
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 8, 2013, 3, 'transcript');", //6242
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 21, 2013, 3, 'transcript');", //6244
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 2, 14, 2013, 3, 'transcript');", //6283 (End Harrison)
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 1, 2005, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 2, 2005, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 3, 2005, 1, 'transcript');",
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 5, 2005, 2, 'transcript');", //6232
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 6, 2005, 2, 'transcript');", //6233
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 7, 2005, 2, 'transcript');", //6241
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 8, 2005, 3, 'transcript');", //6242
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 14, 2005, 3, 'transcript');", //6283
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 16, 2005, 3, 'transcript');", //6286
			"INSERT INTO tp_course_being_taken (user_id, course_id, year, semester, status) VALUES ( 3, 11, 2006, 1, 'transcript');" //6254 (End Clapton)
		),
	'tp_users_meta' =>
		array(
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (1, 'user_id', '333-11-1111');",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (2, 'user_id', '444-11-1111');",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (4, 'user_id', '555-11-1111');",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (5, 'user_id', '666-11-1111');",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (5, 'course_hold', 1);",
			/*"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (1, 1, 'nickname', 'Captain Awesome');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (2, 2, 'nickname', 'Mr. Tumnus');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (3, 3, 'nickname', 'Cheez-it');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (4, 4, 'nickname', 'Tim');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (5, 5, 'nickname', 'Britney');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (6, 6, 'nickname', 'Prof. Narahari');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (7, 7, 'nickname', 'Prof. Drumwright');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (8, 8, 'nickname', 'Prof. Parmer');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (9, 9, 'nickname', 'President Knapp');",
			"INSERT INTO tp_users_meta(umeta_id, user_id, meta_key, meta_val) VALUES (10, 10, 'nickname', 'Wa-Luigi');",*/
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (3, 'teaching_course', 1);",
			"INSERT INTO tp_users_meta(user_id, meta_key, meta_val) VALUES (3, 'teaching_course', 2);",
			//"INSERT INTO tp_users_meta(useR_id, meta_key, meta_val) VALUES (7, 'teaching_course', 3);",
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

	'Student' => array(
			"INSERT INTO Student VALUES(15222586, 'Dian', 'Hu', 'dhu@this.not.gwu', 'PAdbKmkCME', 'Submitted');",
			"INSERT INTO Student VALUES(12693152, 'Joel', 'Klein', 'jdk514@gwmail.gwu.edu', 'l8qWdofxJK', 'Accepted');"
		),

	'Reviewers' => array(
			"INSERT INTO Reviewers VALUES(22876354, 'I shall review');"
		),

	'Recommendation' => array(
			"INSERT INTO Recommendation VALUES(146, 15222586, 'Mike Spleen', 'Professor', 'mspleen@this.not.gwu', '', 'Taught him for a while', NULL);",
			"INSERT INTO Recommendation VALUES(147, 15222586, 'Nothing', 'Im sick', 'nt@this.not.gwu', '', 'of coming up with names', NULL);",
			"INSERT INTO Recommendation VALUES(144, 12693152, 'Carson Evans', 'Head of IT', 'cevans@here.not.gwu', 'Great worker very focused', 'Boss', '3');",
			"INSERT INTO Recommendation VALUES(145, 15222586, 'Rick Jarrel', 'Dean', 'rjarrel@this.not.gwu', '', 'Dean of Temple where dian hu went', NULL);",
			"INSERT INTO Recommendation VALUES(143, 12693152, 'Randy Klein', 'Dr.', 'rklein@myway.not.gwu', 'Know how to get stuff done', 'Father', NULL);",
			"INSERT INTO Recommendation VALUES(142, 12693152, 'Jack Smith', 'Professor', 'jsmith@gmail.not.edu', 'I would definitely have this person run everything', 'Taught and mentored me for two years', NULL);",
		),

	'GA' => array(
			"INSERT INTO GA VALUES(35631579, 'You shall not pass');"
		),

	'Applications' => array(
			"INSERT INTO Applications VALUES(54582981, 'Learning', 15222586, 'MS', 'BS', 'ALL', 'Temple', '4.5', 'BS', '', '', '', '2013-04-17 16:29:05', 'I just study', 'Fall 2013', '', 'Notviewed', '2010-04-24', NULL, NULL);",
			"INSERT INTO Applications VALUES(50568867, 'Fencing', 12693152, 'MS', 'BS', 'Comp Sci', 'GWU', '3.7', 'BS', '', '', '', '2013-04-17 16:22:09', 'TA at GWU', 'Fall 2013', '', 'viewed', '1992-06-04', 'Looks good, but can afford our institution and provides no other warrant for admitting with aid.', 'Admit without Aid');",
	),

	'app_to_reg' => array(
		"INSERT INTO app_to_reg VALUES(12693152, 'Joel', 'Klein', 'jdk514@gwmail.gwu.edu', 'l8qWdofxJK', 'MS');"
	),
	
	'CoursePrerequisites' => array(
		"INSERT INTO CoursePrerequisites values ('CS 6221','None','None');",
		"INSERT INTO CoursePrerequisites values ('CS 6461','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6212','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6220','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6232','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6233','CS 6232','None');",
		"INSERT INTO CoursePrerequisites values ('CS 6241','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6242','CS 6241', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6246','CS 6461','CS 6212');",
		"INSERT INTO CoursePrerequisites values ('CS 6260','CS 6221', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6251','CS 6461', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6254','CS 6221', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6262','None', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6283','CS 6212', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6286','CS 6283', 'CS 6232');",
		"INSERT INTO CoursePrerequisites values ('CS 6284','CS 6212', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6325','CS 6212', 'None');",
		"INSERT INTO CoursePrerequisites values ('CS 6384','CS 6284', 'CS 6283');",
		"INSERT INTO CoursePrerequisites values ('CS 6339','CS 6461','CS 6212');",
		"INSERT INTO CoursePrerequisites values ('EE 6243','None','None');",
		"INSERT INTO CoursePrerequisites values ('EE 6244','None','None');",
		"INSERT INTO CoursePrerequisites values ('Math 6210','None','None');"
	),
/*
	'CourseRegistration' => array (
		"INSERT INTO CourseRegistration values (1,'CS 6221','Software Paradigms',3,'M','3-5:30pm', 'Margaery', 'Tyrell');",
		"INSERT INTO CourseRegistration values (2,'CS 6461','Computer Architecture',3,'T','3-5:30pm','Theon','Greyjoy');",
		"INSERT INTO CourseRegistration values (3,'CS 6212','Algorithms',3,'W','3-5:30pm','Sandor','Clegane');",
		"INSERT INTO CourseRegistration values (4,'CS 6225','Data Compression',3,'R','3-5:30pm','Khal','Drogo');",
		"INSERT INTO CourseRegistration values (5,'CS 6232','Networks 1',3,'M','6-8:30pm','Jeor','Mormont');",
		"INSERT INTO CourseRegistration values (6,'CS 6233','Networks 2',3,'T','6-8:30pm','Samwell','Tarly');",
		"INSERT INTO CourseRegistration values (7,'CS 6241','Database 1',3,'W','6-8:30pm', 'Margaery', 'Tyrell');",
		"INSERT INTO CourseRegistration values (8,'CS 6242','Database 2',3,'R','6-8:30pm','Samwell','Tarly');",
		"INSERT INTO CourseRegistration values (9,'CS 6246','Compilers',3,'T','3-5:30pm', 'Margaery', 'Tyrell');",
		"INSERT INTO CourseRegistration values (10,'CS 6251','Distributed Systems',3,'M','6-8:30pm','Theon','Greyjoy');",
		"INSERT INTO CourseRegistration values (11,'CS 6254','Software Engineering',3,'M','3-5:30pm','Theon','Greyjoy');",
		"INSERT INTO CourseRegistration values (12,'CS 6260','Multimedia',3,'R','6-8:30pm', 'Margaery', 'Tyrell');",
		"INSERT INTO CourseRegistration values (13,'CS 6262','Graphics 1',3,'W','6-8:30pm','Khal','Drogo');",
		"INSERT INTO CourseRegistration values (14,'CS 6283','Security 1',3,'T','6-8:30pm','Theon','Greyjoy');",
		"INSERT INTO CourseRegistration values (15,'CS 6284','Cryptography',3,'M','6-8:30pm','Khal','Drogo');",
		"INSERT INTO CourseRegistration values (16,'CS 6286','Network Security',3,'W','6-8:30pm','Theon','Greyjoy');",
		"INSERT INTO CourseRegistration values (17,'CS 6325','Advanced Algorithms',3,'R','4-6:30pm','Jeor','Mormont');",
		"INSERT INTO CourseRegistration values (18,'CS 6339','Embedded Systems',2,'T','3-5:30pm','Khal','Drogo');",
		"INSERT INTO CourseRegistration values (19,'CS 684','Advanced Crypto',3,'W','4-6:30pm','Jeor','Mormont');",
		"INSERT INTO CourseRegistration values (20,'EE 6243','Communication Systems',3,'M','6-8:30pm','Sandor','Clegane');",
		"INSERT INTO CourseRegistration values (21,'EE 6244','Information Theory',2,'T','6-8:30pm','Sandor','Clegane');",
		"INSERT INTO CourseRegistration values (22,'Math 6210','Logic',2,'W','6-8:30pm','Sandor','Clegane');",
	),

	'Students' => array(
		"INSERT INTO Students values (3000, 'Andrea', 'Holden', 3.5, 'AHolden@gwu.edu', 'Computer Science', 7564389178, '5 Pin Lane', 'Fall', '2010');",
		"INSERT INTO Students values (3001, 'Shane', 'Walsh', 3.0, 'SWalsh@gwu.edu', 'Computer Science', 70923876485, '10 King Ct', 'Fall', '2010' );",
		"INSERT INTO Students values (3002, 'Rick', 'Grimes', 2.5, 'RGrimes@gwu.edu', 'Computer Science', 1276394586, '23 Mary St', 'Fall', '2010' );",
		"INSERT INTO Students values (3003, 'Daryl', 'Dixon', 4.0, 'DDixon@gwu.edu', 'Computer Science', 28736405971, '1203 Tree St', 'Fall', '2010' );",
		"INSERT INTO Students values (3004, 'Maggie', 'Greene', 2.0, 'MGreene@gwu.edu', 'Computer Science', 9762538741, '213 Abigale Ct', 'Fall', '2010' );",
		"INSERT INTO Students values (3005, 'Glenn', 'Rhee', 2.9, 'GRhee@gwu.edu', 'Computer Science', 82681752308, '908 Fortune Lane', 'Fall', '2010' );",
	),

	'Advisors' => array(
		"INSERT INTO Advisors values (2000,'Jon','Snow');",
		"INSERT INTO Advisors values (2001,'Eddard','Stark');",
		"INSERT INTO Advisors values (2002,'Tyrion','Lannister');",
		"INSERT INTO Advisors values (2003,'Daenerys','Targaryen');",
		"INSERT INTO Advisors values (2004,'Petyr','Baelish');",
		"INSERT INTO Advisors values (2005,'Stannis','Baratheon');",
	),
	
	'Instructors' => array(
		"INSERT INTO Instructors values (1000,'Margaery','Tyrell');",
		"INSERT INTO Instructors values (1001,'Theon','Greyjoy');",
		"INSERT INTO Instructors values (1002,'Sandor','Clegane');",
		"INSERT INTO Instructors values (1003,'Khal','Drogo');",
		"INSERT INTO Instructors values (1004,'Jeor','Mormont');",
		"INSERT INTO Instructors values (1005,'Samwell','Tarly');",
	),

	'RequiredCourses' => array(
		"INSERT INTO RequiredCourses values ('MS', 'CS 6221');",
		"INSERT INTO RequiredCourses values ('MS', 'CS 6461');",
		"INSERT INTO RequiredCourses values ('MS', 'CS 6212');",
	),

	'DegreeReqs' => array(
		"INSERT INTO DegreeReqs values ('MS', '2', '10', '3.0', '2.7');",
	),*/
);





drop table if exists Students cascade;
create table Students(
   GWUID     varchar(60) primary key,
   Fname     varchar(60),
   Lname     varchar(60),
   GPA varchar(60),
    Email    varchar(60),
    Degree   varchar(60),
   PhoneNum  int(10),
   Address   varchar(60),
   Semester  varchar(60),
   Year      int(10));
   
drop table if exists Alumni cascade;
create table Alumni(
   GWUID     varchar(60) primary key,
   Fname     varchar(60),
   Lname     varchar(60),
   GPA       varchar(60),
    Email    varchar(60),
    Degree   varchar(60),
   PhoneNum  int(10),
   Address   varchar(60),
   DegreeType  varchar(60),
   YearGrad  varchar(60));
   
drop table if exists CourseRegistration cascade;
create table CourseRegistration(
	CourseID     varchar(60),
	CourseNum varchar(60),  
   	Title  varchar(60),
   	CreditHrs    int(10),
   	ClassDay     varchar(60),
   	ClassTime    varchar(60),
   	InameF       varchar(60),
   	InameL       varchar(60));
   
   drop table if exists CoursePrerequisites cascade;
create table CoursePrerequisites(
	CourseNum 	 varchar(60),
   MainPrereq    varchar(60),
   SecPrereq  	 varchar(60));
   
   drop table if exists Grades cascade;
create table Grades(
   GPA         varchar(60),
   Semester    varchar(60),
   Year        int(10),
   CourseID    varchar(60),
   CreditHrs   varchar(60),
   GWUID	   varchar(60) primary key );
   
   drop table if exists Advisors cascade;
create table Advisors(
	AdvID     varchar(60),
   AnameF     varchar(60),
   AnameL     varchar(60));

   
  drop table if exists Form1 cascade;
create table Form1( 
   GWUID varchar(60),
   Degree varchar(60),
   CourseID varchar(60),
PRIMARY KEY (CourseID, GWUID));
   
     drop table if exists GWUsers cascade;
create table GWUsers(
   GWUID   varchar(60) PRIMARY KEY,
   Pass  varchar(60),
   RoleID int(3));
      
    drop table if exists PendingRequests cascade;
create table PendingRequests(
   GWUID   varchar(60) primary key,
   Fname   varchar(60),
   Lname  varchar(60));

   drop table if exists Transcripts cascade;
create table Transcripts(
	GWUID	varchar(60),
	CourseID varchar(60),
	Grade	varchar(60));

	drop table if exists RequiredCourses cascade;
create table RequiredCourses(
	Degree	varchar(60),
	CourseID varchar(60) primary key);

	drop table if exists DegreeReqs;
create table DegreeReqs(
	Degree varchar(60) primary key,
	NumBadGrades varchar(60),
	NumReqCourses varchar(60),
	MinGpa varchar(60),
	LowGrade varchar(60));

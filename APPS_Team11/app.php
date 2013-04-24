
<head>
<style type="text/css">
.auto-style1 {
	font-size: x-small;
}
</style>
</head>

<script language="javascript">
function checkdata1(data){
	var str=data;
		var Expression=/(\d{4}-)(\d{2}-)(\d{2})$/; 	
		var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
</script>

<script language="javascript">
function check(){
	var rs=new Boolean();
	rs=true;
	if(!checkdata1(stinput.bday.value)||stinput.bday.value.length!=10){
		alert("The format of your birthdate is invalid!");stinput.bday.focus();rs=false;
	}
	 return rs;	}
	
</script>




<?php require_once "header.php"; ?>
<body style="background-color: #FFFFA6">

<div align="center">
<?php
if($_GET["action"]==1){


	//get information from the form
$pfname=htmlspecialchars(trim($_POST["fname"]));
$plname=htmlspecialchars(trim($_POST["lname"]));
$pssid=htmlspecialchars(trim($_POST["ssid"]));$pbday=htmlspecialchars(trim($_POST["bday"]));
$pds=htmlspecialchars(trim($_POST["ds"]));
$ppd=htmlspecialchars(trim($_POST["pd"]));
$pgs=htmlspecialchars(trim($_POST["gs"]));
$pvb=htmlspecialchars(trim($_POST["vb"]));
$pana=htmlspecialchars(trim($_POST["ana"]));
$pwex=htmlspecialchars(trim($_POST["wex"]));
$pdas=htmlspecialchars(trim($_POST["das"]));
$pqua=htmlspecialchars(trim($_POST["qua"]));
$ptf=htmlspecialchars(trim($_POST["tf"]));
$paoi=htmlspecialchars(trim($_POST["aoi"]));
$pphone=htmlspecialchars(trim($_POST["phone"]));
$pemail=htmlspecialchars(trim($_POST["email"]));
$pessay=htmlspecialchars(trim($_POST["essay"]));
$ppu=htmlspecialchars(trim($_POST["pu"]));
$ppgpa=htmlspecialchars(trim($_POST["pgpa"]));
$pmd=htmlspecialchars(trim($_POST["md"]));
$ppd2=htmlspecialchars(trim($_POST["pd2"]));
$ppu2=htmlspecialchars(trim($_POST["pu2"]));
$ppgpa2=htmlspecialchars(trim($_POST["pgpa2"]));
$pmd2=htmlspecialchars(trim($_POST["md2"]));
$email0=htmlspecialchars(trim($_POST["email0"]));
$email1=htmlspecialchars(trim($_POST["email1"]));
$email2=htmlspecialchars(trim($_POST["email2"]));
$af3=htmlspecialchars(trim($_POST["af3"]));
$af4=htmlspecialchars(trim($_POST["af4"]));
$af5=htmlspecialchars(trim($_POST["af5"]));
$title1=htmlspecialchars(trim($_POST["title1"]));
$title2=htmlspecialchars(trim($_POST["title2"]));
$title3=htmlspecialchars(trim($_POST["title3"]));
$recname1=htmlspecialchars(trim($_POST["recname1"]));
$recname2=htmlspecialchars(trim($_POST["recname2"]));
$recname3=htmlspecialchars(trim($_POST["recname3"]));



$status="Submitted";
$apstatus="Notviewed";
$stid = rand(10000000,19999999);
$apid = rand(50000000,59999999);
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);



if($pfname=="") {$err=1;echo "First Name Must be filled<br />";}
if($plname=="") {$err=1;echo "Last Name Must be filled<br />";}
if($pbday=="") {$err=1;echo "Birthday should not be empty<br />";}
if($pds=="") {$err=1;echo "Degree Sought Must be inserted<br />";}
if($pphone=="") {$err=1;echo "Phone number must be filled<br />";}
if($pemail=="") {$err=1;echo "Email address must be filled<br />";}
	
if($err!=1) {
		require_once "config.php";
$query=$db->query("insert into Student (`studentid`,`firstname`,`lastname`,`email`,`loginpassword`,`studentstatus`) values( '".$stid."', '".$pfname."', '".$plname."','".$pemail."','".$randomString."', '".$status."')");
$query=$db->query("insert into Applications (`applicationid`,`aoi`,`studentid`,`dsought`,`pd`,`pgpa`,`workex`,`desdate`,`essayanswer`,`astatus`,`pdu`,`pd2`,`pdu2`,`pgpa2`,`pmj`,`pmj2`,`bday`) values( '".$apid."', '".$paoi."', '".$stid."', '".$pds."', '".$ppd."','".$ppgpa."','".$pwex."', '".$pdas."','".$pessay."', '".$apstatus."', '".$ppu."', '".$ppd2."', '".$ppu2."', '".$ppgpa2."', '".$pmd."','".$pmd2."','".$pbday."')");
$query=$db->query("insert into Transcript (`studentid`,`gre`,`greverbal`,`greana`,`grequan`,`tofel`) values( '".$stid."', '".$pgs."', '".$pvb."', '".$pana."', '".$pqua."','".$ptf."')");
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`,`Authorname`,`Authortitle`) values( '".$stid."','".$email0."','".$af3."','".$recname1."','".$title1."')");
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`,`Authorname`,`Authortitle`) values( '".$stid."','".$email1."','".$af4."','".$recname2."','".$title2."')");
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`,`Authorname`,`Authortitle`) values( '".$stid."','".$email2."','".$af5."','".$recname3."','".$title3."')");




echo "Infomation is submitted<br /> ";
echo  "Your student ID is : $stid <br />";
echo  "Your login password is : $randomString <br />";
echo  "Please keep record of the previous information <br />";
echo  "To view the status of your application <a href='login.php'>click here</a>";
  }
}else{
?>
  <p>GW Application Form</p>
  <hr>
  <form name="stinput" method="post" action="app.php?action=1" onsubmit="return check()">
  	<div align="left">
  	<div>First Name <input type="text" name="fname" id="fname">  Last Name <input type="text" name="lname" id="lname">  <br><br> </div>
SSN <input type="text" name="ssid" id="ssid"> <span class="auto-style1"><em>(Optional)</em></span>  <br /><br /> 
birthday <input type="text" name="bday" id="bday" maxlength="10"> <em>
		<span class="auto-style1">You Must Insert the Date As "1999-12-31" ,10 digits, 
		No Space.</span></em><br /><br />
Degree Sought <select name="ds" id="ds" size="1">
      <option value="PHD">PHD</option>
      <option value="MA">MA</option>
      <option value="MS" selected>MS</option>
      <option value="MD">MD</option>
      <option  value="Undecided">Undecided</option>
        </select><br /><br />
Prior Degrees 1
           <select name="pd" id="pd" size="1">
      <option value="PHD">PHD</option>
      <option value="MA">MA</option>
      <option value="MS">MS</option>
      <option value="MD">MD</option>
      <option value="BA" >BA</option>
      <option value="BS" selected>BS</option>
      <option value="BBA">BBA</option>
      <option  value="Others">Others</option>
        </select>  
Institution of  Degrees 1<input type="text" name="pu" id="pu"> GPA of Degrees 1<input type="text" name="pgpa" id="pgpa" maxlength="4">  Major of Degrees 1<input type="text" name="md" id="md"> <br /><br />
Prior Degrees 2 <select name="pd2" id="pd2" size="1">
      <option value="PHD">PHD</option>
      <option value="MA">MA</option>
      <option value="MS">MS</option>
      <option value="MD">MD</option>
      <option value="BA" >BA</option>
      <option value="BS" selected>BS</option>
      <option value="BBA">BBA</option>
      <option  value="Others">Others</option>
      </select> 
Institution of  Degrees 2<input type="text" name="pu2" id="pu2"> GPA of Degrees 2<input type="text" name="pgpa2" id="pgpa2" maxlength="4">  Major of Degrees 2<input type="text" name="md2" id="md2"> <span class="auto-style1"><em>(Optional)</em></span> <br /><br /> 
GRE Subject  <input type="text" name="gs" id="gs" maxlength="3">  <span class="auto-style1"><em>(Optional)</em></span>
GRE Verbal <input type="text" name="vb" id="vb" maxlength="3">
GRE Analytical <input type="text" name="ana" id="ana" maxlength="1">
GRE Quantitative <input type="text" name="qua" id="qua" maxlength="3"><br/><br/>
TOEFL Score<input type="text" name="tf" id="tf" maxlength="3">
		<span class="auto-style1">&nbsp;TOFEL is only required for students who 
		are identified as non-native English speakers</span><br /><br />
Work Experience <input type="text" name="wex" size="100" id="wex"><br /><br />
Desired Admission Semester 
            <select name="das" id="das" size="1">
      <option value="Fall 2013" selected>Fall 2013</option>
      <option value="Spring 2013">Spring 2013</option>
      <option value="Fall 2013">Fall 2013</option>
      <option value="Part Time">Part Time</option>
      <option value="Summer Program" >Summer Program</option>
         </select>  
<br /><br />
Area of Interest <input type="text" name="aoi"  id="aoi"><br /><br />
		Phone             <input type="text" name="phone" id="phone"> <br /><br />
		Email            <input type="text" name="email" id="email"> <br><br>
    Name of source of Recommendation 1 <input style="margin: 5px 40px 5px 37px" type="text" name="recname1" id="recname1">
    Title of source of Recommendation 1 <input type="text" name="title1" id="title1"><br/>
		Email/Phone of source of Recommendation 1 <input style="margin: 5px 40px 0px 0px" type="text" name="email0" id="email0"> 
		Affiliation of Recommendation 1 
		<input style="margin: 0px 0px 0px 28px" type="text" name="af3" id="af3"><br><br>
    Name of source of Recommendation 2 <input style="margin: 5px 40px 5px 37px" type="text" name="recname2" id="recname2">
    Title of source of Recommendation 2 <input type="text" name="title2" id="title2"><br/>
		Email/Phone of source of Recommendation 2 
		<input style="margin: 5px 40px 0px 0px" type="text" name="email1" id="email1"> Affiliation of 
		Recommendation 2 
		<input style="margin: 0px 0px 0px 28px" type="text" name="af4" id="af4"><br><br>
    Name of source of Recommendation 3 <input style="margin: 5px 40px 5px 37px" type="text" name="recname3" id="recname3">
    Title of source of Recommendation 3 <input type="text" name="title3" id="title3"><br/>
    Email/Phone of source of Recommendation 3 <input style="margin: 5px 40px 0px 0px" type="text" name="email2" id="email2"> 
		Affiliation of Recommendation 3 
		<input style="margin: 0px 0px 0px 28px" type="text" name="af5" id="af5"><br><br><br>  Essay: Why do you choose GW? <br /><br />
content: <textarea cols="45" rows="8" name="rec"></textarea> <br /><br />
    </div><br />
    <input name="submit" type="submit" value="submit">
  </form>
  </div>
<?php
}
require_once "footer.php";
?>

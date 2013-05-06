
<head>
<style type="text/css">
.auto-style1 {
	font-size: x-small;
}
.auto-style2 {
	font-size: small;
}
.auto-style3 {
	text-align: center; font-size:medium;
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
function checkemail(email){
	var str=email;
	var Expression=/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; 
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
</script>

<script language="javascript">
function checkphone(tel){
	var str=tel;
	var Expression=/(\d{3}-)(\d{3}-)(\d{4})$/;  
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
</script>

<script language="javascript">
function checkssn(tel){
	var str=tel;
	var Expression=/(\d{3}-)(\d{2}-)(\d{4})$/;
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}	
</script>

<script language="javascript">
function checkgpa(tel){
	if( tel>5 || tel<0 ){
		return false;
	}else{
		return true;
	}
}	
</script>

<script language="javascript">
function checkGREV(tel){
    if (tel==0) {return true;}
	else{ if (tel>170 || tel<130 ){
		return false;
	}else{
		return true;
	}}
}	
</script>

<script language="javascript">

function checkGREA(tel){
    if (tel==0) {return true;}
	else{ if ( tel>6 || tel<0 ){
		return false;
	}else{
		return true;
	}}
}	
</script>

<script language="javascript">
function checktf(tel){
    if (tel==0) {return true;}
	else{ if (tel>120 || tel<0 ){
		return false;
	}else{
		return true;
	}}
}	
</script>







<script language="javascript">
function check(){
	var rs=new Boolean();
	var ssn=new Boolean();
	rs=true;
	ssn=true;
	if(stinput.ssid.value==""){ ssn=false;}
	

    if( checkssn(stinput.ssid.value)==false && ssn==true ){
		alert("The format of your Social Security Number is invalid!");stinput.ssid.focus();rs=false; return rs;
	}

	if(!checkdata1(stinput.bday.value)||stinput.bday.value.length!=10){
		alert("The format of your birthdate is invalid!");stinput.bday.focus();rs=false; return rs;
	}
	if(!checkemail(stinput.email.value)||stinput.email.value==""){
		alert("The format of your email address is invalid!");stinput.email.focus();rs=false;return rs; 
	}
	if(!checkphone(stinput.phone.value)||stinput.phone.value==""){
		if(window.confirm('The format of your phone number is not following U.S. format. Click OK if you are using an international number')){       
              }else{
                 rs=false; return rs;
            } 
            }
    if(!checkgpa(stinput.pgpa.value)||stinput.pgpa.value==""|| isNaN(stinput.vb.value)){
        alert("The format of your gpa of degree 1 is invalid!");stinput.pgpa.focus();rs=false;return rs; 
	     } 
	if(!checkgpa(stinput.pgpa2.value)||stinput.pgpa2.value==""|| isNaN(stinput.vb.value)){
        alert("The format of your gpa of degree 2 is invalid!");stinput.pgpa2.focus();rs=false;return rs; 
	     } 
	if(!checkGREV(stinput.vb.value)|| isNaN(stinput.vb.value)){
        alert("The GRE Verbal score is invalid!");stinput.vb.focus();rs=false;return rs; 
	     } 
	if(!checkGREA(stinput.ana.value)|| isNaN(stinput.ana.value)){
        alert("The GRE Analytical Writing score is invalid!");stinput.ana.focus();rs=false;return rs; 
	     } 
	if(!checkGREV(stinput.qua.value)|| isNaN(stinput.qua.value)){
        alert("The GRE Quantitative score is invalid!");stinput.qua.focus();rs=false;return rs; 
	     }
	if(!checktf(stinput.tf.value)|| isNaN(stinput.tf.value)){
        alert("The Tofel score is invalid!");stinput.tf.focus();rs=false;return rs; 
	     }
	if(stinput.pu.value=="" ){
        alert("The Institution of Degrees 1 cannot be empty!");stinput.pu.focus();rs=false;return rs; 
	     }
	if(stinput.md.value=="" ){
        alert("The Major of Degrees 1 cannot be empty!");stinput.md.focus();rs=false;return rs; 
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
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`) values( '".$stid."','".$email0."','".$af3."')");
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`) values( '".$stid."','".$email1."','".$af4."')");
$query=$db->query("insert into Recommendation (`studentid`,`Authoremail`,`Affiliation`) values( '".$stid."','".$email2."','".$af5."')");




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
  	<div>
  <p class="auto-style3"><em>Personal Information</em></p>
		<br>First Name <input type="text" name="fname" id="fname">  Last Name <input type="text" name="lname" id="lname">  <br><br> </div>
SSN <input type="text" name="ssid" id="ssid"> <em><span class="auto-style2">
		Optional,But if you insert anything, it should follow</span></em> <em>
		<span class="auto-style2">the format of 999-99-9999</span></em><br /><br /> 
birthday <input type="text" name="bday" id="bday" maxlength="10"> <em>
		<span class="auto-style2">You Must Insert the Date As "1999-12-31" ,10 digits, 
		No Space.</span></em><br /><br />
Phone             <input type="text" name="phone" id="phone">
		<span class="auto-style2"><em>U.S. Student should insert the format as 
		&quot;202-999-9999&quot; , International student should insert full number 
		including country code</em></span> <br /><br />
		Email            <input type="text" name="email" id="email">
		<span class="auto-style2"><em>A valid email address should contains &quot;@&quot;.
		<br><br>
  <p class="auto-style3">Academic Information</p>
		</em></span> <br><br>

		
		
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
      <option value="BS" >BS</option>
      <option value="Not Applicable" selected>Not Applicable</option>
      <option value="BBA">BBA</option>
      <option  value="Others">Others</option>
      </select> 
Institution of  Degrees 2<input type="text" name="pu2" value="null" id="pu2"> GPA of Degrees 2<input type="text" name="pgpa2" id="pgpa2" value="0" maxlength="4">  Major of Degrees 2<input type="text" value="null" name="md2" id="md2"> <span class="auto-style1"><em>(Optional)</em></span> <br /><br /> 
GRE Subject  <input type="text" name="gs" id="gs" maxlength="3" >  <span class="auto-style1"><em>(Optional,indicate 
		subject name and score as Chemistry:550;)</em></span> <br><br>
GRE Verbal <input type="text" name="vb" value=0 id="vb" maxlength="3">
GRE Analytical <input type="text" value=0 name="ana" id="ana" maxlength="1">
GRE Quantitative <input type="text" name="qua" value=0 id="qua" maxlength="3">  <span class="auto-style1"><em>(Optional 
		for Master Program Only,leave it 0 if you did not take it;)</em></span> <br/><br/>
TOEFL Score<input type="text" name="tf" id="tf" value="0" maxlength="3">
		<span class="auto-style1">&nbsp;</span><span class="auto-style2"><em>TOFEL is only required for students who 
		are identified as non-native English speakers<br><br></em>
  <p class="auto-style3">Professional Selection</p>
		</span><br />
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
Area of Interest <input type="text" name="aoi"  id="aoi"><br>
		<span class="auto-style2">
  <p class="auto-style3">Recommendation and Essay</p>
		</span><br /><br />
		Email/Phone of source of Recommendation 1 <input type="text" name="email0" id="email0"> 
		Affiliation of Recommendation 1 
		<input type="text" name="af3" id="af3"><br>
		<br>Email/Phone of source of Recommendation 2 
		<input type="text" name="email1" id="email1"> Affiliation of 
		Recommendation 2 
		<input type="text" name="af4" id="af4"><br><br>Email/Phone of 
		source of Recommendation 3 <input type="text" name="email2" id="email2"> 
		Affiliation of Recommendation 3 
		<input type="text" name="af5" id="af5"><br><br><br>  Essay: Why do you choose GW? <br /><br />
content: <input type="text" name="essay" id="essay" style="height: 247px; width: 618px"> <br /><br />
    </div><br />
    <input name="submit" type="submit" value="submit">
  </form>
  </div>
<?php
}
require_once "footer.php";
?>

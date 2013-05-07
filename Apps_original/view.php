<?php
include 'header.php';
session_start();

?>
  <div id="main">
    <div id="content">
      <div align="center">
        <?php
        $id=$_GET["id"];
        echo 'Application ID:  ';
        echo $id;
        echo '<br />';

        if($_GET["action"]==1){
        $update="viewed";
        $prec1=htmlspecialchars(trim($_POST["rc1"]));
        $prec2=htmlspecialchars(trim($_POST["rc2"]));
        $prec3=htmlspecialchars(trim($_POST["rc3"]));
        $pfrc=htmlspecialchars(trim($_POST["frc"]));
        $pcmt=htmlspecialchars(trim($_POST["cmt"]));      
          if($err!=1) {
            require_once "config.php";
            mysql_query("SET NAMES 'utf8'");
            $query33=$db->query("select * from Applications where applicationid='".$id."'");
            $r33=$db->fetch_array($query33);
            $sid33=$r33["studentid"];
            $query34=$db->query("select * from Recommendation where studentid='".$sid33."'"); 
            $r34=$db->fetch_array($query34);
            $nrecid=$r34["Recid"];
            $nrecid2=$nrecid+1;
                   $nrecid3=$nrecid+2;
                      echo 'All The Information Has Been Updated: ';
                      echo "<a href='list.php'>Go Back</a>";
            $query=$db->query("update Applications set `astatus`= '".$update."' where applicationid='".$id."'");
            $query=$db->query("update Applications set `reviewcom`= '".$pcmt."' where applicationid='".$id."'");
            $query=$db->query("update Applications set `reviewsug`= '".$pfrc."' where applicationid='".$id."'");
            $query=$db->query("update Recommendation set `rate`= '".$prec1."' where Recid='".$nrecid."'");
                   $query=$db->query("update Recommendation set `rate`= '".$prec2."' where Recid='".$nrecid2."'");
            $query=$db->query("update Recommendation set `rate`= '".$prec3."' where Recid='".$nrecid3."'");
            
          }
        }else{
        ?>
          <p></p>
          <hr>
          <form name="teacher_input" method="post" action="view.php?action=1&id=<?php echo $id;?>">
            <div align="left">
            <?php
              require_once "config.php";
              mysql_query("SET NAMES 'utf8'");
              $query=$db->query("select * from Applications where applicationid='".$id."'");
              if($r=$db->fetch_array($query)){ 
                  $sid=$r["studentid"];
                  $query1=$db->query("select * from Transcript where studentid='".$sid."'");
                  $r1=$db->fetch_array($query1);
                  $query2=$db->query("select * from Student where studentid='".$sid."'");
                  $r2=$db->fetch_array($query2);
                  $query3=$db->query("select * from Recommendation where studentid='".$sid."'"); //recommendation 1
                  $r3=$db->fetch_array($query3);
                  $recid=$r3["Recid"];
                  $recid2=$recid+1;
                  $query4=$db->query("select * from Recommendation where Recid='".$recid2."'"); 
                  $r4=$db->fetch_array($query4);
                  $recid3=$recid+2;
                  $query5=$db->query("select * from Recommendation where Recid='".$recid3."'"); 
                  $r5=$db->fetch_array($query5);

                  echo '<br />';
                  echo 'Student ID: ';
                  echo $sid;
                  echo '<br />';
                   echo 'First Name: ';
                  echo $r2["firstname"];
                  echo '<br />';
                  echo 'Desired Admission Semester: ';
                  echo $r["desdate"];
                  echo '<br /><br />';
                  echo 'Applying For Degree: ';
                  echo $r["dsought"];
                  echo '<br /><br />'; 
                  echo 'Summary of Applicant Credentials: ';
                  echo '<br />';
                  echo ' GRE Subject:  '; echo $r1["gre"]; echo '&nbsp'; echo ' GRE Verbal:  '; echo $r1["greverbal"]; echo '&nbsp';  echo ' GRE Analytical:  '; echo $r1["greana"]; echo '&nbsp';
                  echo ' GRE Quantitative:  '; echo $r1["grequan"]; echo '<br /><br />';
                  
                  echo ' Prior Degree 1 :'; echo $r["pd"]; echo '&nbsp&nbsp'; echo ' Institution:  '; echo $r["pdu"]; echo '&nbsp&nbsp';  echo ' Major :  '; echo $r["pmj"]; echo '&nbsp&nbsp';
                 echo ' GPA of this Degree:  '; echo $r["pgpa"]; echo '<br />';
                 
                  echo ' Prior Degree 2 :'; echo $r["pd2"]; echo '&nbsp&nbsp'; echo ' Institution:  '; echo $r["pdu2"]; echo '&nbsp&nbsp';  echo ' Major :  '; echo $r["pmj2"]; echo '&nbsp&nbsp';
                  echo ' GPA of this Degree:  '; echo $r["pgpa2"]; echo '<br /><br />';
                
                  echo 'Work Experience: <input type="text" name="teacher_xl" readonly style="height: 150px; width: 400px;background-color:#FFFF99" id="teacher_xl" value="'.$r["workex"].'"><br /><br />';
                 echo 'Area of Interest <input type="text" name="teacher_zw" readonly id="teacher_zw" style="background-color:#FFFF99" value="'.$r["aoi"].'"><br /><br />';
                 echo 'Essay <input type="text" name="teacher_phone" readonly id="teacher_phone" style="height: 247px; width: 618px;background-color:#FFFF99" value="'.$r["essayanswer"].'"><br /><br />';
                 
                  echo ' Recommendation 1  Affliation: '; echo $r3["Affiliation"]; 
                  echo '<br />';

                  echo 'Content: <input type="text" name="rec1" readonly id="rec1" style="height: 150px; width: 400px;background-color:#FFFF99" value="'.$r3["Content"].'">'; 
                  echo' Rating of Recommendation 1  <select name="rc1" id="rc1" size="1">
                 <option value="5">5</option><option value="4">4</option> <option value="3">3</option> <option value="2">2</option> <option value="1">1</option>
                 <option value="Not-Credible" selected>Not-Credible</option>
                 <option value="Need Further Verification">Need Further Verification</option>
                 </select>';
                  echo '<br /><br />';

                  
                  echo ' Recommendation 2  Affliation: '; echo $r4["Affiliation"]; echo '<br />';
                  echo 'Content: <input type="text" name="rec2" readonly id="rec2" style="height: 150px; width: 400px;background-color:#FFFF99" value="'.$r4["Content"].'">';
                  echo' Rating of Recommendation 2  <select name="rc2" id="rc2" size="1">
                 <option value="5">5</option><option value="4">4</option> <option value="3">3</option> <option value="2">2</option> <option value="1">1</option>
                 <option value="Not-Credible" selected>Not-Credible</option>
                 <option value="Need Further Verification">Need Further Verification</option>
                 </select>';
                  echo '<br /><br />';

                  
                  echo ' Recommendation 3 Affliation: '; echo $r5["Affiliation"]; echo '<br />';
                  echo 'Content:  <input type="text" name="rec3" readonly id="rec3" style="height: 150px; width: 400px ;background-color:#FFFF99" value="'.$r5["Content"].'">';
                  echo' Rating of Recommendation 3  <select name="rc3" id="rc3" size="1">
                 <option value="5">5</option><option value="4">4</option> <option value="3">3</option> <option value="2">2</option> <option value="1">1</option>
                 <option value="Not-Credible" selected>Not-Credible</option>
                 <option value="Need Further Verification">Need Further Verification</option>
                 </select>';
                  echo '<br /><br />';
                  
                  echo ' Grad Admissions Committee (GAS) Reviewer Recommendation/Rating: ';  echo '<br />';
                 echo'  <select name="frc" id="frc" size="1">
                 <option value="Admit With Aid">Admit With Aid</option>
                 <option value="Admit without Aid">Admit without Aid</option> 
                 <option value="Borderline Admit">Borderline Admit</option> 
                 <option value="Reject">Reject</option>
                 </select>';
                  echo '<br /><br />';
                echo 'Reason of previous recommendation <input type="text" name="cmt"  id="cmt" ; style="height: 150px; width: 300px" ><br /><br />';







              }
              
              

              
              
              
            ?>
            </div><br />
            <input name="submit" type="submit" value="viewed">
           </form>
          </div>
        <?php
        }
        ?>
  </div>
</div>

<?php include 'footer.php'; ?>

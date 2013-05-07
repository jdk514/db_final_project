<?php
include 'header.php';
session_start();

}
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
        if($err!=1) {
          require_once "config.php";
          mysql_query("SET NAMES 'utf8'");
                    echo 'All The Information Has Been Updated: ';
          
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
                 echo '<br />';

                echo 'Content: <input type="text" name="rec1" readonly id="rec1" style="height: 150px; width: 400px;background-color:#FFFF99" value="'.$r3["Content"].'">'; 
                echo' Rating of Recommendation 1: ' ;           
                echo $r3["rate"];
                echo '<br /><br />';

                
                echo ' Recommendation 2  Affliation: '; echo $r4["Affiliation"]; echo '<br />';
                echo 'Content: <input type="text" name="rec2" readonly id="rec2" style="height: 150px; width: 400px;background-color:#FFFF99" value="'.$r4["Content"].'">';
                echo' Rating of Recommendation 2: ' ;        
                echo $r4["rate"];
                echo '<br /><br />';

                
                echo ' Recommendation 3 Affliation: '; echo $r5["Affiliation"]; echo '<br />';
                echo 'Content:  <input type="text" name="rec3" readonly id="rec3" style="height: 150px; width: 400px ;background-color:#FFFF99" value="'.$r5["Content"].'">';
                echo' Rating of Recommendation 3: ' ;           
                echo $r5["rate"];
                echo '<br /><br />';
                
                echo ' Grad Admissions Committee (GAS) Reviewer Recommendation/Rating: ';  echo '<br />';
                echo $r["reviewsug"];
                echo '<br /><br />';
                echo ' Reviewer Comment ';  echo '<br />';
                echo $r["reviewcom"];
              echo '<br />';
          echo "<td><center><a href='galist.php'>Go Back To The List</a></center></td>";






            }
            
            

            
            
            
          ?>
          </div><br />
         </form>
        </div>
      <?php
      }
      ?>

  </div>
</div>

<?php include 'footer.php'; ?>

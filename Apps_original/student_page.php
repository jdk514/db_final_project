<?php
include 'header.php';
session_start();

$_SESSION["login_Student"] = "true";

function query(){
    require_once "config.php";
    $student = (int)$_SESSION["username"];
    $query = "SELECT studentid, firstname, lastname, studentstatus FROM Student WHERE studentid=$student";
    $result = mysql_query($query)
    or die('Error querying database.');
    $result = mysql_fetch_row($result);
    return $result;
}
?>
    <div id="main">
        <div id="content">
            <?php if($_SESSION["login_Student"] = "true") :?>
                <div style="text-align:center">
                    Student Status Page</br>
                <div>
                    <?php $status=query();
                        echo ($status[1]." ".$status[2].": ".$status[3]);
                        if($status[3]=="Accepted"){
                            ?>
                            <form name="Accept" action="accepted.php" method="post"><br/>
                                <input type="submit" name="Status" value="Enroll">
                                <input type="submit" name="Status" value="Reject">
                                <input type="submit" name="Status" value="Defer">
                            </form></br>
                            <?php
                        }
                        if ($status[3]=="Enroll"){
                            ?>
                            <p>Congratulations on your acceptance! Welcome to GWU, click <a href="registration.php">here</a>
                                to begin your registration.</p>
                                <?php
                        }
                    ?>
                    </br><a href="appupdate.php?id=<?php echo $_SESSION['username']?>">Update Application Information</a>
                </div>
            </div>
            <?php else :?>
                <script>
                    window.location = "login.php"
                </script>
            <?php endif?>
    </div>
</div>

<?php include 'footer.php'; ?>

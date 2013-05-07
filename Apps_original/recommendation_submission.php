<?php
include 'header.php';
session_start();

if(!empty($_POST)){
    query();
}

function query(){
    $content= $_POST["rec"];
    require_once "config.php";
    $user = (int)$_GET["id"];
    $rec = (int)$_GET["rec"];
    $query = "UPDATE Recommendation SET Content='$content' WHERE studentid=$user AND recid=$rec";
    $result = mysql_query($query)
    or die('Error querying database.');
}

function query_check(){
    require_once "config.php";
    $user = $_GET["id"];
    $rec = $_GET["rec"];
    $query = "SELECT * FROM Recommendation WHERE $user=studentid AND $rec=recid";
    $result = mysql_query($query)
    or die('Error querying database.');
    $result = mysql_fetch_row($result);
    if(empty($result)){
        return false;
    }else{
        return true;
    }
}

function rec_exists(){
    require_once "config.php";
    $user = $_GET["id"];
    $rec = $_GET["rec"];
    $query = "SELECT * FROM Recommendation WHERE $user=studentid AND $rec=recid";
    $result = mysql_query($query)
    or die('Error querying database.');
    $result = mysql_fetch_row($result);
    if(empty($result[5])){
        return false;
    }else{
        return true;
    }
}
?>
    <div id="main">
        <div id="content">
            <?php if ($_GET["id"] && rec_exists()) : ?>
                <div style="text-align:center">
                    GWU Recommendation Submission Page</br>
                    <div>
                        <p>Recommendation has been submitted</p>
                    </div>
                </div>
            <?php elseif ($_GET["id"] && query_check()) : ?>
                <div>
                    GWU Recommendation Submission Page</br>
                    <div>
                        <form name="recommendation" action="recommendation_submission.php?id=<?php print($_GET['id'])?>&rec=<?php print($_GET['rec'])?>" method="post">
                            <table class="form">
                                <tr><td><h3>Paste Your Recommendation Into The Field Below</h3></td></tr>
                                <tr><td><textarea cols="60" rows="8" name="rec" style="width:610px"></textarea></td>
                                <tr><td> <input type="submit" Value="submit"></td></tr>
                            </table>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <div>
                        GWU Recommendation Submission Page</br>
                    <div>
                        <p>This page is only accesible to people listed for recommendations. Please refer to the email containg the login link
                            or send an email to <a href="mailto:jdk514@gwmail.gwu.edu">gwu.app.edu</a> for further assistance</p>
                    </div>
                </div>
            <?php endif ?>
    </div>
</div>

<?php include 'footer.php'; ?>

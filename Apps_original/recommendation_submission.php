<html>
<style>
body {
    margin: 50px 0px;
    padding: 10px;
    text-align: center;
}

td {
    padding: 10px;
}

div#main {
    width: 600px;
    margin: 0px auto;
    padding: 15px;
    border: 1px solid #000000;
    background-color: lightblue;
    text-align: center;
    box-shadow: 10px 10px 5px #888888;
}
div#header{
	width: 600px;
	margin: 0px auto;
	text-align: center;
	padding: 15px 15px 15px 15px;
}
</style>
<?php
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
<body>
<?php if ($_GET["id"] && rec_exists()) : ?>
    <div id="header">
                    GWU Recommendation Submission Page</br>
                <div id="main">
                    <p>Recommendation has been submitted</p>
                </div>
            </div>
<?php elseif ($_GET["id"] && query_check()) : ?>
    <div id="header">
                    GWU Recommendation Submission Page</br>
                <div id="main">
                    <form name="recommendation" action="recommendation_submission.php?id=<?php print($_GET['id'])?>&rec=<?php print($_GET['rec'])?>" method="post">
                        <table class="form">
                            <tr><td><h3>Paste Your Recommendation Into The Field Below</h3></td></tr>
                            <tr><td><textarea cols="45" rows="8" name="rec"></textarea></td>
                            <tr><td> <input type="submit" Value="submit"></td></tr>
                        </table>
                    </form>
                </div>
    </div>
<?php else : ?>
    <div id="header">
                GWU Recommendation Submission Page</br>
            <div id="main">
                <p>This page is only accesible to people listed for recommendations. Please refer to the email containg the login link
                    or send an email to <a href="mailto:jdk514@gwmail.gwu.edu">gwu.app.edu</a> for further assistance</p>
            </div>
    </div>
<?php endif ?>
</body>

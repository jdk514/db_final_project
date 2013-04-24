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


session_start();

if(!empty($_POST)){
    query($_POST);
}

function query($rec){
    $user = $rec["sid"];
    $sname = $rec["sname"];
    $name = $rec["name"];
    $title = $rec["title"];
    $email = $rec["email"];
    $content = $rec["rec"];
    $affiliation = $rec["affiliation"];
    //email_rec($email, $sname, $user);
    $dbc = mysql_connect("localhost", "jdk514", "s3cr3t201e")
        or die('Error connecting to MySQL server.'); 
        mysql_select_db("jdk514", $dbc);
        $query = "INSERT INTO Recommendation(studentid, Authorname, Authortitle, Authoremail, Affiliation) VALUES ($user, '$name', '$title', '$email', '$affiliation')";//set studentstatus to the new status if the id's match
        mysql_query($query)
        or die('Error querying database.');
}

/*function email_rec($email, $sname, $sid){
    $to = $email;
    $subject = "GWU Recommendation Request";
    $message = "
    <html>
    <body>
        <p>To whomever it may concern,<p></br>
        <p>$sname has submitted a request for a recommendation for The George Washington University.</br>
        If you wish to submit a recommendation please go to <a href='recommendation_submission.php?id=$user'>Open Link</a></p>
    </body>
    </html>
    ";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Noreply <noreply@example.com>' . "\r\n";                                             
    $from = "gwu.apps.edu";
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
}*/

?>
<head>
    <?php if (empty($_POST)) : ?>
            <body class="body">
                <div id="header">
                    GWU Recommendation Submission Page</br>
                <div id="main">
                    <form name="recommendation" action="recommendation_page.php" method="post">
                        <table class="form">
                            <tr><td><h3>Applicant Information</h3></td></tr>
                            <tr>
                                <td>Studentid: </td><td> <input type="text" name="sid"></td>
                            </tr><tr>
                                <td>Full Name: </td><td> <input type="text" name="sname"></td>
                            </tr>
                            <tr><td><h3>Contact Information for the person writing your recommendation</h3></td></tr>
                            <tr>
                                <td>Name: </td><td> <input type="text" name="name"></td>
                            </tr><tr>
                                <td>Title: </td><td> <input type="text" name="title"></td>
                            </tr><tr>
                                <td>Email: </td><td> <input type="text" name="email"></td>
                            </tr><tr>
                                <td>Affiliation to Student: </td><td> <input type="text" name="affiliation"></td>
                            </tr><tr>
                                <td></td><td> <input type="submit" Value="submit"></td>
                            </tr></table>
                    </form>
                </div>
            </body>
    <?php else : ?>
        <body>
            <div id="main"><h3>Submission Sucessful</h3></div>
        </body>
    <?php endif ?>
</head>
</html>

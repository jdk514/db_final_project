<?php
include 'header.php';
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
?>
    <div id="main">
        <div id="content">
                <?php if (empty($_POST)) : ?>
                    <div>
                        GWU Recommendation Submission Page</br>
                        <div>
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
                    </div>
            <?php else : ?>
                    <div style="text-align:center"><h3>Submission Sucessful</h3></div>
            <?php endif ?>
    </div>
</div>

<?php include 'footer.php'; ?>

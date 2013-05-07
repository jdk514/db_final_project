<html>
<head>
<title>Edit Contact Information</title>
</head>
<body>
<h2>  Edit Contact Information
</h2>
<form method="post" action="MakeEdits.php">


<?php
//See if each check box is checked and display and edit textbox acordingly
if (isset($_POST['Email'])) {
echo '<label for="Email">New Email:</label>';
echo '<input type="text" id="Email" name="Email" /><br /><br />';
}

if (isset($_POST['Phone'])) {
echo '<label for="PhoneNum">New Phone Number:</label>';
echo '<input type="text" id="PhoneNum" name="PhoneNum" /><br /><br />';
}

if (isset($_POST['Street1'])) {
echo '<label for="Street1">New Street 1:</label>';
echo '<input type="text" id="Street1" name="Street1" /><br /><br />';
}

if (isset($_POST['Street2'])) {
echo '<label for="Street2">New Street 2:</label>';
echo '<input type="text" id="Street2" name="Street2" /><br /><br />';
}

if (isset($_POST['state_prov'])) {
echo '<label for="state_prov">New State / Province:</label>';
echo '<input type="text" id="state_prov" name="state_prov" /><br /><br />';
}

if (isset($_POST['zipcode'])) {
echo '<label for="zipcode">New Zipcode:</label>';
echo '<input type="text" id="zipcode" name="zipcode" /><br /><br />';
}

if (isset($_POST['city'])) {
echo '<label for="city">New City:</label>';
echo '<input type="text" id="city" name="city" /><br /><br />';
}


?>
<input type="submit" value="Submit Changes" name="submit" />
</form>
</body>
</html>

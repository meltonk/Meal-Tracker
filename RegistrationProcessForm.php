<?php
//Connect to database server
// $link = mysqli_connect('127.0.0.1', 'root', 'lifei$fullofBeauty', 'mymealtracker');
$link = mysqli_connect('127.0.0.1', 'root', '1', 'mymealtracker');
//check the connection to the database
if (mysqli_connect_errno()) {
    die ('Connect failed: ' . mysqli_connect_error());
}

//	Retrieve the data submitted from the form and store it into local variables
$firstName = $_POST['user_firstName'];
$lastName = $_POST['user_lastName'];
$birthday = $_POST['user_birthday'];
//$dayOfWeek = array();
//$dayOfWeek[0] = isset($_POST['monday'])	 	? 1 : 0;
//$dayOfWeek[1] = isset($_POST['tuesday'])		? 1 : 0;
//$dayOfWeek[2] = isset($_POST['wednesday'])	? 1 : 0;
//$dayOfWeek[3] = isset($_POST['thursday'])		? 1 : 0;
//$dayOfWeek[4] = isset($_POST['friday'])	 	? 1 : 0;
//$dayOfWeek[5] = isset($_POST['saturday'])		? 1 : 0;
//$dayOfWeek[6] = isset($_POST['sunday'])	 	? 1 : 0;

//$session = $_POST['user_session1'];
//$session = $_POST['user_session2'];
//$session = $_POST['user_session3'];
$address1 = $_POST['user_address1'];
$city = $_POST['user_city'];
$state = $_POST['user_state'];
$zip = $_POST['user_zip'];
$phoneNumber = $_POST['telNo'];
$emailAddress = $_POST['emailAddress'];
//$parentfirstName = $_POST['user_parentfirstName'];
//$parentlastName = $_POST['user_parentlastName'];

//escape the string so it can be inserted into an SQL query
$firstName = mysqli_real_escape_string($link, $firstName);
$lastName = mysqli_real_escape_string($link, $lastName);
$birthday = mysqli_real_escape_string($link, $birthday);
//$dayOfWeek[0] = mysqli_real_escape_string($link,$dayOfWeek[0]);
//$dayOfWeek[1] = mysqli_real_escape_string($link,$dayOfWeek[1]);
//$dayOfWeek[2] = mysqli_real_escape_string($link,$dayOfWeek[2]);
//$dayOfWeek[3] = mysqli_real_escape_string($link,$dayOfWeek[3]);
//$dayOfWeek[4] = mysqli_real_escape_string($link,$dayOfWeek[4]);
//$dayOfWeek[5] = mysqli_real_escape_string($link,$dayOfWeek[5]);
//$dayOfWeek[6] = mysqli_real_escape_string($link,$dayOfWeek[6]);
$address1 = mysqli_real_escape_string($link, $address1);
$city = mysqli_real_escape_string($link, $city);
$state = mysqli_real_escape_string($link, $state);
$zip = mysqli_real_escape_string($link, $zip);
$phoneNumber = mysqli_real_escape_string($link, $phoneNumber);
$emailAddress = mysqli_real_escape_string($link, $emailAddress);
//$parentfirstName = mysqli_real_escape_string($link, $parentfirstName);
//$parentlastName = mysqli_real_escape_string($link, $parentlastName);



// get the clients IP address
$IP = $_SERVER['REMOTE_ADDR'];

// create a string with a SQL code
$sql = "INSERT INTO mymealtracker.childsinformation (FirstName, LastName,Address1,City,State,ZipCode,PhoneNumber,EMail, BirthDate,PortalName,IP_Address) 
VALUES 
('$firstName','$lastName','$address1','$city', '$state', '$zip','$phoneNumber', '$emailAddress','$birthday','3306','$IP')";

//execute the SQL query created
$res = mysqli_query($link, $sql);
if ($res) {
	// Success
} else {
	echo mysqli_error($link);
}

$numChild = mysqli_insert_id($link);

// Insert Days of the week for this Child.
//$sql = "INSERT INTO mymealtracker.daysofweek
//(child_id, monday, tuesday, wednesday, thursday, friday, saturday, sunday)
//VALUES
//($numChild, $dayOfWeek[0], $dayOfWeek[1], $dayOfWeek[2], $dayOfWeek[3], $dayOfWeek[4], $dayOfWeek[5], $dayOfWeek[6])";

//$res = mysqli_query($link, $sql);
//if ($res) {
	// Success
//} else {
//	echo mysqli_error($link);
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Process the Registration.html form</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <style type="text/css">

    </style>
</head>
<body>
<div class="topnav"> <!--navigation-->
    <ul class="main-nav">
        <li class="active"><a href="index.html"> HOME </a></li>
        <li><a href="Registration.html"> REGISTRATION </a></li>

    </ul>
</div>

<div class="mealTracker"> <!--header Meal Tracker in upper left conner-->
    <h1> Meal Tracker</h1>
</div>

<p class="thankyou">
    THANK YOU
   
</p>

<p class="thank">
    <?php print ("$firstName $lastName") ?> <br>
    your Registration member number <?php print ("$numChild") ?></br>
    your form has been Successfully Submitted<br>
</p>


</body>
</html>
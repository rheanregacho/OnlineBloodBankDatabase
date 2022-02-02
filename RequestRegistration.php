<html>
<head>
    <title>Blood Request Registration</title>
    <link rel="stylesheet"href="Register.css">
</head>
<body>
<div class="header">
    <form action= "RequestsPage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<?php

$firstName = $lastName = $middleName = "--";
$fname = $mname = $lname = $age = $gender = $birthday = $nmbr = $loc = "";
$bloodtype = $notiftype = $prcreq = $ffpreq = $platreq = $cryreq = $whoreq= "";
$fnameE = $mnameE = $lnameE = $ageE = $genderE = $birthdayE = $nmbrE = $locE = "";
$bloodtypeE = $notiftypeE = $prcreqE = $ffpreqE = $platreqE = $cryreqE = $whoreqE = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameE = "* First name is required.";
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["mname"])) {
        $mnameE = "* Middle name is required.";
    } else {
        $mname = test_input($_POST["mname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameE = "* Last name is required.";
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["age"])) {
        $ageE = "* Age is required.";
    } else {
        $age = test_input($_POST["age"]);
    }

    if (empty($_POST["gender"])) {
        $genderE = "* Gender is required.";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["birthday"])) {
        $birthdayE = "* Birthday is required.";
    } else {
        $birthday = test_input($_POST["birthday"]);
    }

    if (empty($_POST["nmbr"])) {
        $nmbrE = "* Contact number is required.";
    } else {
        $nmbr = test_input($_POST["nmbr"]);
    }

    if (empty($_POST["loc"])) {
        $locE = "* Location is required.";
    } else {
        $loc = test_input($_POST["loc"]);
    }

    if (empty($_POST["bloodtype"])) {
        $bloodtypeE = "* Blood type is required.";
    } else {
        $bloodtype = test_input($_POST["bloodtype"]);
    }

    if (empty($_POST["notiftype"])) {
        $notiftypeE = "* Notification type is required.";
    } else {
        $notiftype = test_input($_POST["notiftype"]);
    }

}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<h3 class="headerText" style="top: 10%">Requester Basic Information</h3>
<div class="formBox">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input class="lcolumn" style="top: 30%" type="text" placeholder="First Name" name="fname"/>
	<span class="error"><?php echo $fnameE;?>
	<input class="lcolumn" style="top: 40%" type="text" placeholder="Middle Name" name="mname"/>
	<span class="error"><?php echo $mnameE;?>
	<input class="lcolumn" style="top: 50%" type="text" placeholder="Last Name" name="lname"/>
	<span class="error"><?php echo $lnameE;?>
	<select class="lcolumn" style="top: 60%" name="gender"/>
		<option>Gender</option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
	</select><span class="error"><?php echo $genderE;?>
	<div class="control" style="top: 70%">
  <label class="radio">
    <input type="radio" name="answer">
    Yes
  </label>
  <label class="radio">
    <input type="radio" name="answer">
    No
  </label>
</div>
	<input class="rcolumn" style="top: 30%" type="text" placeholder="Age" name="age"/>
	<span class="error"><?php echo $ageE;?>
	<input class="rcolumn" style="top: 40%" type="date" placeholder="Birthday" name="birthday"/>
	<span class="error"><?php echo $birthdayE;?>
	<input class="rcolumn" style="top: 50%" type="text" placeholder="Contact Number" name="nmbr"/>
	<span class="error"><?php echo $nmbrE;?>
	<input class="rcolumn" style="top: 60%" type="text" placeholder="Address" name="loc"/>
	<span class="error"><?php echo $locE;?>
	<h3 class="headerText" style="top: 70%">Request</h3>
	<select class="ccolumn" style="top: 90%" name="bloodtype"/>
		<option>Blood Group</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
	</select><span class="error"><?php echo $bloodtypeE;?>
	<select class="ccolumn" style="top: 100%" name="notiftype"/>
		<option value="Notification Type">Notification Type</option>
		<option value="Emergency">Emergency</option>
		<option value="Urgent">Urgent (within 1 hour)</option>
		<option value="Standard">Standard (within 12 hours)</option>
		<option value="Group and Save">Group and Save (within 7 days)</option>
	</select><span class="error"><?php echo $notiftypeE;?>
	<input class="ccolumn" style="top: 110%" type="text" placeholder="Packed Red Cells (units)" name="prcreq"/>
	<span class="error"><?php echo $prcreqE;?>
	<input class="ccolumn" style="top: 120%" type="text" placeholder="FFP (units)" name="ffpreq"/>
	<span class="error"><?php echo $ffpreqE;?>
	<input class="ccolumn" style="top: 130%" type="text" placeholder="Platelets (units)" name="platreq"/>
	<span class="error"><?php echo $platreqE;?>
	<input class="ccolumn" style="top: 140%" type="text" placeholder="Cryoprecipitate (units)" name="cryreq"/>
	<span class="error"><?php echo $cryreqE;?>
	<input class="ccolumn" style="top: 150%" type="text" placeholder="Whole Blood (units)" name="whoreq"/>
	<span class="error"><?php echo $whoreqE;?>
    <input class="submitB" style="top:160%" type="submit" value="Submit">
</form>
</div>

<?php

$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect){
    die();
}

$selectDB = mysqli_select_db($sqlConnect, "DB6");
if(!$selectDB){
    die("Failed to connect to database.".mysqli_error());
}

$result_out = mysqli_query($sqlConnect,"select * from basic where lname = '$lname' and mname = '$mname' and fname = '$fname'");

while($VD=mysqli_fetch_array($result_out)) {
    $firstName = $VD["fname"];
    $lastName = $VD["lname"];
    $middleName = $VD["mname"];
}

if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($age) && !empty($gender) && !empty($birthday) && !empty($nmbr) && !empty($loc) && !empty($bloodtype) && !empty($notiftype)){
    if (($fname == $firstName) && ($lname == $lastName) and ($mname == $middleName)) {
        ?><p><span class="error3">* Name is already in database.</span></p><?php
    } else {
        $sqlbasic = "insert into basic(fname, mname, lname, age, gender, birthday, nmbr, loc, bloodtype)
	values('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[birthday]', '$_POST[nmbr]', '$_POST[loc]', '$_POST[bloodtype]')";
        mysqli_query($sqlConnect, $sqlbasic);

        $sqlrequest = "insert into request(fname, lname, notiftype, prcreq, ffpreq, platreq, cryreq, whoreq)
	values('$_POST[fname]', '$_POST[lname]', '$_POST[notiftype]', '$_POST[prcreq]', '$_POST[ffpreq]', '$_POST[platreq]', '$_POST[cryreq]', '$_POST[whoreq]')";
        mysqli_query($sqlConnect, $sqlrequest);

        echo '<script type="text/javascript">';
        echo 'alert("Your request is in queue. We will contact you for further details.");';
        echo '</script>';
        header("Location:RequestsPage.php");
    }
}

mysqli_close($sqlConnect);

?>
</body>
</html>

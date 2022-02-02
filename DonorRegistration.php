<html>
<head>
    <title>Donor Registration</title>
    <link rel="stylesheet"href="Register.css">
</head>
<body>
<div class="header">
    <form action= "DonorsPage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<?php

$firstName = $lastName = $middleName = "--";
$fname = $mname = $lname = $age = $gender = $birthday = $nmbr = $email = $loc = "";
$bloodtype = $weight = $ftdonor = $lbloodd = $pregnant = $tattoo = "";
$fnameE = $mnameE = $lnameE = $ageE = $nmbrE = $genderE = $birthdayE = $nmbrE = $emailE = $locE = "";
$bloodtypeE = $weightE = $ftdonorE = $lblooddE = $pregnantE = $tattooE = "";

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

    if (empty($_POST["email"])) {
        $emailE = "* Email is required.";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["loc"])) {
        $locE = "* Address is required.";
    } else {
        $loc = test_input($_POST["loc"]);
    }

    if (empty($_POST["bloodtype"])) {
        $bloodtypeE = "* Blood type is required.";
    } else {
        $bloodtype = test_input($_POST["bloodtype"]);
    }

    if (empty($_POST["weight"])) {
        $weightE = "* Weight is required.";
    } else {
        $weight = test_input($_POST["weight"]);
    }

    if (empty($_POST["ftdonor"])) {
        $ftdonorE = "* Answer is required.";
    } else {
        $ftdonor = test_input($_POST["ftdonor"]);
    }

    if (empty($_POST["lbloodd"])) {
        $lblooddE = "* Answer is required.";
    } else {
        $lbloodd = test_input($_POST["lbloodd"]);
    }

    if (empty($_POST["pregnant"])) {
        $pregnantE = "* Answer is required.";
    } else {
        $pregnant = test_input($_POST["pregnant"]);
    }

    if (empty($_POST["tattoo"])) {
        $tattooE = "* Answer is required.";
    } else {
        $tattoo = test_input($_POST["tattoo"]);
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h3 class="headerText" style="top: 10%">Donor Basic Information</h3>

<div class="formBox">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<input class="lcolumn" style="top: 30%" type="text" placeholder="First Name" name="fname"/>
	<span class="error"><?php echo $fnameE;?><br></td>
	<input class="lcolumn" style="top: 40%" type="text" placeholder="Middle Name" name="mname"/>
	<span class="error"><?php echo $mnameE;?><br></td>
	<input class="lcolumn" style="top: 50%" type="text" placeholder="Last Name" name="lname"/>
	<span class="error"><?php echo $lnameE;?><br></td>
	<input class="lcolumn" style="top: 60%" type="text" placeholder="Address" name="loc"/>
	<span class="error"><?php echo $locE;?><br></td>
	<input class="lcolumn" style="top: 70%" type="date" placeholder="Birthday" name="birthday"/>
	<span class="error"><?php echo $birthdayE;?><br></td>
	
	<select class="rcolumn" style="top: 30%" name="bloodtype"/>
		<option>Blood Group</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
	</select><span class="error"><?php echo $bloodtypeE;?><br></td>
	<input class="rcolumn" style="top: 40%" type="text" placeholder="Age" name="age"/>
	<span class="error"><?php echo $ageE;?>
	<select class="rcolumn" style="top: 50%" name="gender"/>
		<option>Gender</option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
	</select><span class="error"><?php echo $genderE;?>
	<input class="rcolumn" style="top: 60%" type="text" placeholder="Contact Number" name="nmbr"/>
	<span class="error"><?php echo $nmbrE;?>
	<input class="rcolumn" style="top: 70%" type="text" placeholder="Email" name="email"/>
	<span class="error"><?php echo $emailE;?>

<h3 class="headerText" style="top: 80%">Donor Medical Information</h3>
	<input class="ccolumn" style="top: 95%" type="text" placeholder="Weight (kg)" name="weight"/>
	<span class="error"><?php echo $weightE;?>
	<select class="ccolumn" style="top: 105%" name="ftdonor"/>
		<option>First-Time Donor</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><span class="error"><?php echo $ftdonorE;?>
	<select class="ccolumn" style="top: 115%" name="lbloodd"/>
		<option>Donated blood for the past 3 months</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><span class="error"><?php echo $lblooddE;?>
	<select class="ccolumn" style="top: 125%" name="pregnant"/>
		<option>Pregnant</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><span class="error"><?php echo $pregnantE;?>
	<select class="ccolumn" style="top: 135%" name="tattoo"/>
		<option>Had tattoo/piercing for the past 3 months</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><span class="error"><?php echo $tattooE;?>
    <input class="submitB" type="submit" value="Submit">
</form>
</div>

<?php

$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect){
    die();
}

$selectDB = mysqli_select_db($sqlConnect, "DB5");
if(!$selectDB){
    die("Failed to connect to database.".mysqli_error());
}

$result_out = mysqli_query($sqlConnect,"select * from tab1 where lname = '$lname' and mname = '$mname' and fname = '$fname'");
while($VD=mysqli_fetch_array($result_out)) {
    $firstName = $VD["fname"];
    $lastName = $VD["lname"];
    $middleName = $VD["mname"];
}

if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($age) && !empty($gender) && !empty($birthday) && !empty($nmbr) && !empty($email) && !empty($loc) && !empty($bloodtype) && !empty($ftdonor) && !empty($lbloodd) && !empty($pregnant) && !empty($tattoo)){
    if (($fname == $firstName) && ($lname == $lastName) and ($mname == $middleName)) {
        ?><p><span class="error3">* Name is already in database.</span></p><?php
    } else {
        $sqltab1 = "insert into tab1(fname, mname, lname, age, gender, birthday, nmbr, email, address, bloodtype)
	values('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[birthday]', '$_POST[nmbr]', '$_POST[email]', '$_POST[loc]', '$_POST[bloodtype]')";
        mysqli_query($sqlConnect, $sqltab1);

        $sqltab2 = "insert into tab2(fname, lname, bloodtype, weight, ftdonor, lbloodd, pregnant, tattoo)
	values('$_POST[fname]', '$_POST[lname]', '$_POST[bloodtype]', '$_POST[weight]', '$_POST[ftdonor]', '$_POST[lbloodd]', '$_POST[pregnant]', '$_POST[tattoo]')";
        mysqli_query($sqlConnect, $sqltab2);

        echo '<script type="text/javascript">';
        echo 'alert("Your registration is sent to Pink Cross. We will contact you for further details.");';
        echo '</script>';
        header("Location:DonorsPage.php");
    }
}

mysqli_close($sqlConnect);

?>
</body>
</html>
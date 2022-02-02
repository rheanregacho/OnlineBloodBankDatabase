<html>
<title>Donor Information</title>
<body>
<?php

echo $_POST["fname"]."<br>";
echo $_POST["mname"]."<br>";
echo $_POST["lname"]."<br>";
echo $_POST["age"]."<br>";
echo $_POST["gender"]."<br>";
echo $_POST["birthday"]."<br>";
echo $_POST["nmbr"]."<br>";
echo $_POST["email"]."<br>";
echo $_POST["loc"]."<br>";
echo $_POST["bloodtype"]."<br>";
echo $_POST["ftdonor"]."<br>";
echo $_POST["lbloodd"]."<br>";
echo $_POST["pregnant"]."<br>";
echo $_POST["tattoo"]."<br>";


$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect){
    die();
}

$selectDB = mysqli_select_db($sqlConnect, "DB5");
if(!$selectDB){
    die("Failed to connect to database.".mysqli_error());
}

$sql = "insert into tab1(fname, mname, lname, age, gender, birthday, nmbr, email, address, bloodtype)
values('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[birthday]', '$_POST[nmbr]', '$_POST[email]', '$_POST[loc]', '$_POST[bloodtype]')";
mysqli_query($sqlConnect, $sql);

$help = "insert into tab2(fname, lname, bloodtype, weight, ftdonor, lbloodd, pregnant, tattoo)
values('$_POST[fname]', '$_POST[lname]', '$_POST[bloodtype]', '$_POST[weight]'.' kg', '$_POST[ftdonor]', '$_POST[lbloodd]', '$_POST[pregnant]', '$_POST[tattoo]')";
mysqli_query($sqlConnect, $help);

$result_out = mysqli_query($sqlConnect, "select tab1.fname, mname, tab1.lname, age, gender, birthday, nmbr, email, address, tab1.bloodtype, weight, ftdonor, lbloodd, pregnant, tattoo from tab1 join tab2 on tab1.lname=tab2.lname");
if(!$result_out){
    die();
}

echo "<table border='1'>
    <tr>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Age</th>
	<th>Gender</th>
	<th>Birthday</th>
	<th>Number</th>
	<th>Email</th>
	<th>Address</th>
	<th>Blood Type</th>
	<th>Weight</th>
	<th>First-Time Donor</th>
	<th>Donated blood</th>
	<th>Pregnant</th>
	<th>Had tattoo/piercing</th>
	</tr>";

while($VolunteersDtls = mysqli_fetch_array($result_out)){
    echo "<tr>";
    echo "<td>" . $VolunteersDtls['fname'] . "</td>";
    echo "<td>" . $VolunteersDtls['mname'] . "</td>";
    echo "<td>" . $VolunteersDtls['lname'] . "</td>";
    echo "<td>" . $VolunteersDtls['age'] . "</td>";
    echo "<td>" . $VolunteersDtls['gender'] . "</td>";
    echo "<td>" . $VolunteersDtls['birthday'] . "</td>";
    echo "<td>" . $VolunteersDtls['nmbr'] . "</td>";
    echo "<td>" . $VolunteersDtls['email'] . "</td>";
    echo "<td>" . $VolunteersDtls['address'] . "</td>";
    echo "<td>" . $VolunteersDtls['bloodtype'] . "</td>";
    echo "<td>" . $VolunteersDtls['weight'] . "</td>";
    echo "<td>" . $VolunteersDtls['ftdonor'] . "</td>";
    echo "<td>" . $VolunteersDtls['lbloodd'] . "</td>";
    echo "<td>" . $VolunteersDtls['pregnant'] . "</td>";
    echo "<td>" . $VolunteersDtls['tattoo'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($sqlConnect);

?>
</body>
</html>
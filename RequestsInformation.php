<html>
<title>Blood Request</title>
<body>
<?php

echo $_POST["fname"]."<br>";
echo $_POST["mname"]."<br>";
echo $_POST["lname"]."<br>";
echo $_POST["age"]."<br>";
echo $_POST["gender"]."<br>";
echo $_POST["birthday"]."<br>";
echo $_POST["nmbr"]."<br>";
echo $_POST["loc"]."<br>";
echo $_POST["bloodtype"]."<br>";
echo $_POST["notiftype"]."<br>";
echo $_POST["prcreq"]."<br>";
echo $_POST["ffpreq"]."<br>";
echo $_POST["platreq"]."<br>";
echo $_POST["cryreq"]."<br>";
echo $_POST["whoreq"]."<br>";

$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect){
    die();
}

$selectDB = mysqli_select_db($sqlConnect, "DB6");
if(!$selectDB){
    die("Failed to connect to database.".mysqli_error());
}

$sql = "insert into basic(fname, mname, lname, age, gender, birthday, nmbr, loc, bloodtype)
values('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[birthday]', '$_POST[nmbr]', '$_POST[loc]', '$_POST[bloodtype]')";
mysqli_query($sqlConnect, $sql);

$help = "insert into request(fname, lname, notiftype, prcreq, ffpreq, platreq, cryreq, whoreq)
values('$_POST[fname]', '$_POST[lname]', '$_POST[notiftype]', '$_POST[prcreq]', '$_POST[ffpreq]', '$_POST[platreq]', '$_POST[cryreq]', '$_POST[whoreq]')";
mysqli_query($sqlConnect, $help);

$result_out = mysqli_query($sqlConnect, "select basic.fname, mname, basic.lname, age, gender, birthday, nmbr, loc, basic.bloodtype, notiftype, prcreq, ffpreq, platreq, cryreq, whoreq from basic join request on basic.lname=request.lname");
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
	<th>Location</th>
	<th>Blood Type</th>
	<th>Notification Type</th>
	<th>Packed Red Cells</th>
	<th>FFP</th>
	<th>Platelets</th>
	<th>Cryoprecipitate</th>
	<th>Whole Blood</th>
	</tr>";

while($RequestsDtls = mysqli_fetch_array($result_out)){
    echo "<tr>";
    echo "<td>" . $RequestsDtls['fname'] . "</td>";
    echo "<td>" . $RequestsDtls['mname'] . "</td>";
    echo "<td>" . $RequestsDtls['lname'] . "</td>";
    echo "<td>" . $RequestsDtls['age'] . "</td>";
    echo "<td>" . $RequestsDtls['gender'] . "</td>";
    echo "<td>" . $RequestsDtls['birthday'] . "</td>";
    echo "<td>" . $RequestsDtls['nmbr'] . "</td>";
    echo "<td>" . $RequestsDtls['loc'] . "</td>";
    echo "<td>" . $RequestsDtls['bloodtype'] . "</td>";
    echo "<td>" . $RequestsDtls['notiftype'] . "</td>";
    echo "<td>" . $RequestsDtls['prcreq'] . "</td>";
    echo "<td>" . $RequestsDtls['ffpreq'] . "</td>";
    echo "<td>" . $RequestsDtls['platreq'] . "</td>";
    echo "<td>" . $RequestsDtls['cryreq'] . "</td>";
    echo "<td>" . $RequestsDtls['whoreq'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($sqlConnect);

?>
</body>
</html>
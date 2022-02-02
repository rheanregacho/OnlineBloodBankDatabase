<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

//choose the database
$selectDB = mysqli_select_db($sqlConnect,'DB6');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

?>

<html>
<title>Requests Update</title>
<link rel="stylesheet"href="Design.css">
<body>
<div class="header">
    <form action= "AdminPage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<?php
$fname = $mname = $lname = "--";
$firstName = $middleName = $lastName = "";
$fnameErr = $mnameErr = $lnameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fname = "* required";
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["mname"])) {
        $mnameErr = "* required";
    } else {
        $mname = test_input($_POST["mname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "* required";
    } else {
        $lname = test_input($_POST["lname"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="login-box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2>Remove Request<br></h2>
        <table>
            <tr><td>First Name: <br></td>
                <td><input type="text" name="fname"/><br></td></tr></table>
        <table>
            <tr><td>Middle Name: <br></td>
                <td><input type="text" name="mname"/><br></td></tr></table>
        <table>
            <tr><td>Last Name: <br></td>
                <td><input type="text" name="lname"/><br></td></tr></table>
        <br><input type="submit" value="Update"/>
    </form>
</div>

<?php
$result_out = mysqli_query($sqlConnect,"select * from basic where fname='$fname' and mname = '$mname' and lname = '$lname'");

while($VD=mysqli_fetch_array($result_out)) {
    $firstName = $VD["fname"];
    $middleName = $VD["mname"];
    $lastName = $VD["lname"];
}

if(!$result_out) {
    die();
}

if (($firstName != "") && ($middleName != "") && ($lastName != "")) {
    if (($fname == $firstName) && ($mname == $middleName) && ($lname == $lastName)) {
        $sql = "delete from basic where fname='$fname' and mname = '$mname' and lname = '$lname'";
        mysqli_query($sqlConnect, $sql);
        $sql2 = "delete from request where fname='$fname' and lname = '$lname'";
        mysqli_query($sqlConnect, $sql2);
        echo "Data deleted from database.";
        header("Location:AdminPage.php");
    } else echo "Data not found in database.";
}

?>

</body>
</html>
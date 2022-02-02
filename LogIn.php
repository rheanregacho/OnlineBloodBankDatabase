<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

//choose the database
$selectDB = mysqli_select_db($sqlConnect,'Accounts');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

?>

<html>
<head><title>Log In</title></head>
<body>

<?php
$Username = mysqli_real_escape_string($sqlConnect,$_REQUEST["Username"]);
$Password = mysqli_real_escape_string($sqlConnect,$_REQUEST["Password"]);

$query = "select * from Admin where Username='$Username'";
$result_out = mysqli_query($sqlConnect,$query);
$username = "";

while($VD=mysqli_fetch_array($result_out)) {
    $LastName = $VD["LastName"];
    $FirstName = $VD["FirstName"];
    $username = $VD["Username"];
    $password = $VD["Password"];
}

if ($Username == $username) {
    if ($Password == $password) {

    }
    else {
        echo "Password is incorrect.";
        ?>
        <form action="LogIn.html" method="post">
            <br><br>
            <input type="submit" name="submit" value="Log In">
        </form>
        <form action="SignUpPHP.php">
            <input type="submit" name="submit" value="Register">
        </form>
        <?php
    }
} else {
    echo "Account is not registered.";
    ?>
    <form action="LogIn.html" method="post">
        <br><br>
        <input type="submit" name="submit" value="Log In">
    </form>
    <form action="SignUpPHP.php">
        <input type="submit" name="submit" value="Register">
    </form>
    <?php
}

if(!$result_out) {
    die();
}

?>

</body>
</html>

<?php
mysqli_close($sqlConnect);
?>
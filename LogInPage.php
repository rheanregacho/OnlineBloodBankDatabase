<html>
<head>
    <title>Admin Log-In</title>
    <link rel="stylesheet"href="Design.css">
</head>
<body>

<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

//choose the database
$selectDB = mysqli_select_db($sqlConnect,"Accounts");
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$LogInUsername = $LogInPassword = "---";
$logUserErr = $logPassErr = "";
$Username = $Password = "--";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Username"])) {
        $logUserErr = "*";
    } else {
        $LogInUsername = test_input($_POST["Username"]);
    }
    if (empty($_POST["Password"])) {
        $logPassErr = "*";
    } else {
        $LogInPassword = test_input($_POST["Password"]);
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
    <img src="pinkCrossLogo.png">
    <h1>Pink Cross</h1>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true" style="color: darkred"></i>
            <input type="text" placeholder="Username" name="Username">
            <span class="error"><?php echo $logUserErr;?></span>
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true" style="color: darkred"></i>
            <input type="password" placeholder="Password" name="Password">
            <span class="error"><?php echo $logPassErr;?></span>
        </div>
        <input class="btn" type="submit" value="Log In">
    </form>
    <form action= "Mainpage.php">
        <button class="btn3">Return to Main Page</button>
    </form>
</div>
<?php

$result_out = mysqli_query($sqlConnect,"select * from Admin where Username = '$LogInUsername'");
while($VD=mysqli_fetch_array($result_out)) {
    $Username = $VD["Username"];
    $Password = $VD["Password"];
}

if ($LogInPassword == $Password) {
    header("Location:AdminPage.php");
} else if (($Username == $LogInUsername) && ($LogInPassword != $Password)) {
    ?>
    <p><span class="error2">Password entered is incorrect</span></p>
    <?php
} else if (($LogInUsername != "---") && ($LogInPassword != "---")){
    ?>
    <p><span class="error2">Account does not exist.</span></p>
    <?php
}
?>
</body>
</html>
<html>
<head>
    <title>PinkCross Homepage</title>
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
$selectDB = mysqli_select_db($sqlConnect,"Available");
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$searchBank = $searchType = "---";
$searchBankErr = $searchTypeErr = "";
$bank = $type = "--";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["bank"])) {
        $searchBankErr = "*";
    } else {
        $searchBank = test_input($_POST["bank"]);
    }
    if (empty($_POST["type"])) {
        $searchTypeErr = "*";
    } else {
        $searchType = test_input($_POST["type"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<img src="pinkCrossLogo.png">
<form action= "LogInPage.php">
    <button class="admin"><i class="fa fa-user-md"></i></button>
</form>

<div class="dropdown">
    <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <div class="dropdown-content">
        <a href="AvailablePage.php">Available Blood</a>
        <a href="DonorsPage.php">Blood Donors</a>
        <a href="RequestsPage.php">Blood Requests</a>
    </div>
</div>

<h3 class="headerText">Meet the nation's one of the largest online<br>blood information archive</h3>

<form action= "searchResult.php" method="post">
    <input class="search" style="left: 20%" type="search" placeholder="Location" name="bank">
    <select class="search" style="left: 50.25%" name="type">
        <option>Blood Group</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <input class="searchB" type="submit" value="Search">
</form>

<div class="registerLine"><form action="DonorRegistration.php">
        Donate your blood and make a difference.<button>Join us!</button>
    </form>
</div>

<div class="footer">
    <p>Homepage</p>
</div>

<?php

$result_out = mysqli_query($sqlConnect,"select * from blood where bank like '%$searchBank%' and type like '%$searchType%';");
while($VD=mysqli_fetch_array($result_out)) {
    $bank = $VD["bank"];
    $type = $VD["type"];
}

if (($searchType == $type)) {
    header("Location:searchResult.php");
} else if (($searchBank!= "---") && ($searchType != "---")){
    ?>
    <p><span class="error2">There are no entries for your query.</span></p>
    <?php
}
?>
</body>
</html>
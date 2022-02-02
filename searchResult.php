<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

// First Database (Available Blood)
$selectDB = mysqli_select_db($sqlConnect,'Available');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$searchBank = $_POST["bank"];
$searchType = $_POST["type"];

$sort = "";
$query = "select * from blood where bank like '%$searchBank%' and type like '%$searchType%';";
$result_out = mysqli_query($sqlConnect,$query);
?>

<html>
<head>
    <title>Pink Cross</title>
    <link rel="stylesheet"href="Design.css">
</head>
<body>
<form action="HomePage.php">
    <button class="admin" style="float: left; margin-left: 10px"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
<img src="pinkCrossLogo.png" style="position: absolute">
<form action= "LogInPage.php" method="post">
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

<div class='SelectedPage'>
    <h3>Search Results</h3>

<?php
if (mysqli_num_rows($result_out)) {
    echo "<table class='content-table' style='margin-left:auto;margin-right:auto;'>
        <thead>
        <tr>
            <th>Blood Type</th>
            <th>Blood Bank</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
</div>";
}

$type = "";
while($VD=mysqli_fetch_array($result_out)) {
    $type = $VD["type"];
    $bank = $VD["bank"];
    $stocks = $VD["stocks"];
    echo "<tr><td>";
    echo $type;
    echo "</td><td>";
    echo $bank;
    echo "</td><td>";
    echo $stocks;
    echo "</td></tr>";
}
echo "</tbody></table>";

if(!$result_out) {
    die();
}

$selectDB = mysqli_select_db($sqlConnect,'DB5');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$query = "select * from tab1 where address like '%$searchBank%' and bloodtype like '%$searchType%'";
$result_out = mysqli_query($sqlConnect,$query);

$float = "left";
$margin = 10;
$count = 1;
$fname = "";

while($VD=mysqli_fetch_array($result_out)) {
    $fname = $VD["fname"];
    $mname = $VD["mname"];
    $lname = $VD["lname"];
    $age = $VD["age"];
    $gender = $VD["gender"];
    $birthday = $VD["birthday"];
    $nmbr = $VD["nmbr"];
    $email = $VD["email"];
    $address = $VD["address"];
    $bloodtype = $VD["bloodtype"];
    echo "<table class='individual' style='float: left; margin-left:".$margin."px;margin-right: ".$margin."px;'><td><p1>".
        $bloodtype."</p1></td><td><p2>".$fname." ".$mname." ".$lname."</p2><br><p3>".
        $nmbr."</p3><br><p4>".$address."</p4></td></table>";
    $margin += 15;
    $count += 1;
    if ($margin > 25) {
        $margin = 10;
    }
    if ($count == 4) $margin = 10;
}

if (($fname == null) && ($type == null)) {
    echo "No entry in database.";
}
if(!$result_out) {
    die();
}
?>

<div class="footer">
</div>

</body>
</html>

<?php
mysqli_close($sqlConnect);
?>
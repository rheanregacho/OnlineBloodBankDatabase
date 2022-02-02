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

$sort = "";
$query = "select * from blood";
$result_out = mysqli_query($sqlConnect,$query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sort = test_input($_POST["sort"]);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<head>
    <title>Pink Cross</title>
    <link rel="stylesheet"href="Design.css">
</head>
<body>

<img src="pinkCrossLogo.png" style="position: absolute">
<form action= "LogInPage.php" method="post">
    <button class="admin"><i class="fa fa-user-md"></i></button>
</form>
<form action="HomePage.php">
    <button class="admin" style="float: left; margin-left: 10px"><i class="fa fa-home" aria-hidden="true"></i></button>
</form>
<div class="dropdown">
    <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <div class="dropdown-content">
        <a href="AvailablePage.php">Available Blood</a>
        <a href="DonorsPage.php">Blood Donors</a>
        <a href="RequestsPage.php">Blood Requests</a>
    </div>
</div>

<div class="SelectedPage">
    <h3>List of Available Blood Types</h3>
    <i class="fa fa-search" style="margin-left: 80px"></i> <input type="search">
    <div style="float: right; margin-right: 80px;">
        <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <select name="sort">
                <option value="all">Show All</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <button type="submit" name="sortButton"><i class="fa fa-sort" aria-hidden="true"></i></button></form>
    </div>
    <table class="content-table" style="margin-left:auto;margin-right:auto;">
        <thead>
        <tr>
            <th>Blood Type</th>
            <th>Blood Bank</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
</div>

<?php
if ((isset($_POST['sortButton']) and ($sort != "all"))) {
    $result_out = mysqli_query($sqlConnect,"select * from blood where type = '$sort'");
} else if ($sort == "all") {
    $result_out = mysqli_query($sqlConnect,"select * from blood");
}

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
// First Database (Available Blood)
$selectDB = mysqli_select_db($sqlConnect,'DB5');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

?>

</body>
</html>

<?php
mysqli_close($sqlConnect);
?>
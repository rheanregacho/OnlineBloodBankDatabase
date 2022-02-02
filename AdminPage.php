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

$query = "select * from blood";
$result_out = mysqli_query($sqlConnect,$query);
?>

<html>
<head>
    <title>Admin - Pink Cross</title>
    <link rel="stylesheet"href="Design.css">
</head>
<body>
<img src="pinkCrossLogo.png" style="position: absolute">
<form action= "HomePage.php">
    <button class="admin"><i class="fa fa-sign-out"></i></button>
</form>
<div class="SelectedPage">
<h3>List of Available Blood Types</h3>
<table class="content-table" style="margin-left: 15px">
    <thead>
    <tr>
        <th>Blood Type</th>
        <th>Blood Bank</th>
        <th>Stock</th>
    </tr>
    </thead>
    <tbody>

    <?php
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

    $query = "select * from tab1";
    $result_out = mysqli_query($sqlConnect,$query);
    ?>
    <form action="AvailableUpdate.php"><input type="submit" style="margin-left: 15px" value="Update"/></form>
    <h3 style="margin-left: 15px">List of Blood Donors</h3>
    <table class="content-table" style="margin-left: 15px">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Birth Date</th>
            <th>Contact Number</th>
            <th>Email Address</th>
            <th>Location</th>
            <th>Blood Type</th>
        </tr>
        </thead>
        <tbody>
        <?php
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
            echo "<tr><td>".$fname."</td><td>".$mname."</td><td>".$lname."</td><td>".$age."</td><td>";
            echo $gender."</td><td>".$birthday."</td><td>".$nmbr."</td><td>".$email."</td><td>".$address;
            echo "</td><td>".$bloodtype."</td></tr>";
        }
        echo "</tbody></table>";

        if(!$result_out) {
            die();
        }

        $selectDB = mysqli_select_db($sqlConnect,'DB6');
        if(!$selectDB) {
            die("Can't find the database!".mysqli_error());
        }

        $query = "select * from basic";
        $result_out = mysqli_query($sqlConnect,$query);
        ?>
        <form action="DonorUpdate.php"><input type="submit" style="margin-left: 15px" value="Update"/></form>
        <h3 style="margin-left: 15px">List of Blood Requests</h3>
        <table class="content-table" style="margin-left: 15px">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Birth Date</th>
                <th>Contact Number</th>
                <th>Location</th>
                <th>Blood Type</th>
            </tr>
            </thead>
            <tbody>
<?php
while($VD=mysqli_fetch_array($result_out)) {
    $fname = $VD["fname"];
    $mname = $VD["mname"];
    $lname = $VD["lname"];
    $age = $VD["age"];
    $gender = $VD["gender"];
    $birthday = $VD["birthday"];
    $nmbr = $VD["nmbr"];
    $email = $VD["loc"];
    $bloodtype = $VD["bloodtype"];
    echo "<tr><td>".$fname."</td><td>".$mname."</td><td>".$lname."</td><td>".$age."</td><td>";
    echo $gender."</td><td>".$birthday."</td><td>".$nmbr."</td><td>".$email."</td><td>".$bloodtype."</td></tr>";
}
echo "</tbody></table>";

if(!$result_out) {
    die();
}
?>
<form action="RequestUpdate.php"><input type="submit" style="margin-left: 15px" value="Update"/></form>
</div>
<?php
?>
</body>
</html>

<?php
mysqli_close($sqlConnect);
?>
<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

//choose the database
$selectDB = mysqli_select_db($sqlConnect,'Available');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

?>

<html>
<title>Available Blood Update</title>
<link rel="stylesheet"href="Design.css">
<body>
<div class="header">
    <form action= "AdminPage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<?php
$BloodType = $BloodBank = $Stocks = $Operator = "";
$type = $bank = $stocks = "--";
$typeErr = $bankErr = $operatorErr = $stocksErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["type"])) {
        $typeErr = "Select type";
    } else {
        $BloodType = test_input($_POST["type"]);
    }

    if (empty($_POST["bank"])) {
        $bankErr = "Last name is required";
    } else {
        $BloodBank = test_input($_POST["bank"]);
    }

    if (empty($_POST["operator"])) {
        $operatorErr = "Select option";
    } else {
        $Operator = test_input($_POST["operator"]);
    }

    if (empty($_POST["stocks"])) {
        $stocksErr = "First name is required";
    } else {
        $Stocks = test_input($_POST["stocks"]);
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
    <h2>Available Blood Update<br></h2>
    <table>
        <tr>
        <tr><td>Blood Type<br></td>
            <td><select name="type">
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select><br></td></tr></table>
        </tr>
    <table>
        <tr><td>Bank <br></td>
            <td><input type="text" name="bank"/><br></td></tr></table>
        <tr>
    <table>
        <tr><td>Operator<br></td>
            <td>
                <input name="operator" type="radio" value="update"> Update
                <input name="operator" type="radio" value="add"> Add <br>
                <input name="operator" type="radio" value="subtract"> Subtract
                <input name="operator" type="radio" value="delete"> Delete
            </select><br></td></tr></table>
        </tr>
    <table>
        <tr><td>Stocks<br></td>
            <td><input type="number" name="stocks"/><br></td></tr></table>
    <br><input type="submit" value="Update"/>
</form>
</div>

<?php
$result_out = mysqli_query($sqlConnect,"select * from blood where type='$BloodType' and bank = '$BloodBank'");

while($VD=mysqli_fetch_array($result_out)) {
    $type = $VD["type"];
    $bank = $VD["bank"];
    $stocks = $VD["stocks"];
}

if(!$result_out) {
    die();
}

if (($Operator == "add") && ($Stocks != "")) {
    $Stocks = (int)$stocks + (int)$Stocks;
    if (($type == $BloodType) && ($bank == $BloodBank)) {
        $sql = "update blood set stocks = '$Stocks' where type = '$BloodType' and bank = '$BloodBank'";
        mysqli_query($sqlConnect, $sql);
        echo "Database updated.";
        header("Location:AdminPage.php");
    } else echo "Data not found in database.";
} elseif (($Operator == "subtract") && ($Stocks != "")) {
    $Stocks = (int)$stocks - (int)$Stocks;
    if (($type == $BloodType) && ($bank == $BloodBank)) {
        $sql = "update blood set stocks = '$Stocks' where type = '$BloodType' and bank = '$BloodBank'";
        mysqli_query($sqlConnect, $sql);
        echo "Database updated.";
        header("Location:AdminPage.php");
    } else echo "Data not found in database.";
} elseif ($Operator == "update") {
    if (($Stocks != "") && ($BloodType != "") && ($BloodBank != "")) {
        $sql = "insert into blood (type,bank,stocks) values ('$BloodType','$BloodBank','$Stocks')";
        mysqli_query($sqlConnect, $sql);
        echo "Database updated.";
        header("Location:AdminPage.php");
    } else echo "Data not found in database.";
} elseif (($Operator == "delete") && ($BloodType != "") && ($BloodBank != "")) {
    if (($type == $BloodType) && ($bank == $BloodBank)) {
        $sql = "delete from blood where type = '$BloodType' and bank = '$BloodBank'";
        mysqli_query($sqlConnect, $sql);
        echo "Data deleted from database.";
        header("Location:AdminPage.php");
    } else echo "Data not found in database.";
}
?>

</body>
</html>
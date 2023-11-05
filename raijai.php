<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}


$name = $_POST['name'];
$money = $_POST['money'];
$date = $_POST['date'];
// $id = $_POST['userid'];
$sql = "SELECT * FROM daily_information2 WHERE name= '$name'";


$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode('Error');
} else {
    $insert = "INSERT INTO daily_information2(name,money,date)VALUES('$name','$money','$date')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo json_encode('Succeed');
    }
}
<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}

$name = $_POST['namedaily'];
$money = $_POST['money'];
$date = $_POST['date'];
$sql = "SELECT * FROM daily_information WHERE namedaily = '$name'";


$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode('Error');
} else {
    $insert = "INSERT INTO daily_information(namedaily,money,date)VALUES('$name','$money','$date')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo json_encode('Succeed');
    }
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    // แก้ไขคำสั่ง SQL เพื่อใช้ tid ใน WHERE clause
    $sql = "INSERT INTO daily_information(namedaily,money,date,userid)VALUES('$name','$money','$date',$id)";
    $result = mysqli_query($con, $sql);
  
    // if ($result) {
    //     // ดำเนินการเรียกข้อมูลที่ต้องการต่อไป
    //     $select_sql = "SELECT * FROM `user` WHERE id = $id";
    //     $select_result = mysqli_query($con, $select_sql);
        
    //     if ($select_result->num_rows > 0) {
    //         $data = array(); 
    //         while ($row = $select_result->fetch_assoc()) {
    //             $data[] = $row; 
    //         }
    //         echo json_encode($data);
    //     } else {
    //         echo "ไม่พบข้อมูล";
    //     }
    // } else {
    //     echo "ไม่สามารถอัปเดตข้อมูลได้";
    // }
  } else {
    echo "ไม่ได้รับค่า tid";
  }
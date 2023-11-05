<?php
require "connect.php";

// ตรวจสอบว่ามีค่า tid ถูกส่งมาหรือไม่
if(isset($_POST['id'])){
  $id = $_POST['id'];
  
  // แก้ไขคำสั่ง SQL เพื่อใช้ tid ใน WHERE clause
  $sql = "SELECT * FROM `daily_information` WHERE  userid = $id";
  $result = mysqli_query($con, $sql);

  if ($result) {
      // ดำเนินการเรียกข้อมูลที่ต้องการต่อไป
      $select_sql = "SELECT * FROM `daily_information` WHERE id = $id";
      $select_result = mysqli_query($con, $select_sql);
      
      if ($select_result->num_rows > 0) {
          $data = array(); 
          while ($row = $select_result->fetch_assoc()) {
              $data[] = $row; 
          }
          echo json_encode($data);
      } else {
          echo "ไม่พบข้อมูล";
      }
  } else {
      echo "ไม่สามารถอัปเดตข้อมูลได้";
  }
} else {
  echo "ไม่ได้รับค่า tid";
}
?>
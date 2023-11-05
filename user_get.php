<?php
require "connect.php";
$username = $_POST['username'];
$user_db = "SELECT * FROM user WHERE email = '".$username."'";
$result = mysqli_query($con, $user_db);

if($result->num_rows > 0){
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }
    echo json_encode($data);
} else{
    echo "not data";
}
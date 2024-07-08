<?php
require_once("../database/connection.php");
$id = $_GET['emp_id'];
$status =$_GET['status'];

if($status==0){
    $sts = 1;
}else{
    $sts = 0;
}
$sql = "UPDATE register SET status = $sts WHERE emp_id = $id";
$r = mysqli_query($con,$sql);
if($r){
    header("location:admin.php");
}else{
    echo "error";
}

?>
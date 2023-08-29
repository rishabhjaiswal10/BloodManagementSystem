<?php

$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$id=$_GET['id'];

$approve="update request_blood set status='rejected' where id='$id'";
$data=mysqli_query($conn,$approve);
if($data)
{
    echo "<script>window.location='admin_request.php';</script>";
}




?>
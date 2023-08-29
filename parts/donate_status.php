<?php

$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";
$id=$_GET['id'];
$conn = new mysqli($servername,$username,$password,$dbname);
$q="update donors set status='accepted' where id='$id'";
$data=mysqli_query($conn,$q);
if($data)
{
    echo "<script>window.location='admin_donors.php';</script>";
}









?>
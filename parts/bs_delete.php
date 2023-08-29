<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$id=$_GET['id'];

  $del = "delete from bloodstock where stock_id='$id'";
  $val = mysqli_query($conn,$del);
  if($val)
  {
   echo "<script>window.location='bloodstock.php';</script>";
  }

?>
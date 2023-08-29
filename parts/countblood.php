<?php


$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM bloodstock";
                $query = $conn->query($sql);

                echo "<h1>".$query->num_rows."</h1>";
?>
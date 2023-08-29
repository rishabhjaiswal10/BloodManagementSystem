


<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);



$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['pwd'];
$confirmpassword=$_POST['cpwd'];
$mobile=$_POST['mobile'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$bloodgroup=$_POST['bloodgroup'];


$query="INSERT INTO registration VALUES ('','$firstname','$lastname','$email','$password','$confirmpassword','$mobile','$DOB','$gender','$address','$bloodgroup')";
if($query)
{
    echo "true";
}
$data = mysqli_query($conn,$query);
if($data)
{
    echo "<script> alert('Registered successfully'); window.location='login.html'</script>";
}


?>
    


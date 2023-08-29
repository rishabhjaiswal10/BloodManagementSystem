
<?php
session_start();
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);

    if(isset($_POST["submit"])){

        $username = $_POST["email"];
        $password = $_POST["pass"];
        if($username=='admin' && $password=='admin9082')
        {
            header("location:dashboard.php");
        }
        else
        {
        $query = "SELECT * from registration where email='$username' and password='$password'";
        
        $rowcount=mysqli_query($conn,$query);

        if(mysqli_num_rows($rowcount)==true)
        {
            $_SESSION['user']=$username;
            header("location:user_main.php");
        }
        else {
            echo "<script> alert('Wrong username or password'); window.location='login.html'</script>";
        }
       }
    }

?>

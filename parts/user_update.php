<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:600&display=swap');
*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  
}
h4{
  font-family: 'Montserrat', sans-serif;
}
.sidebar{
  position: fixed;
  width: 240px;
  left: 0;//-240px;
  height: 100%;
  background: #ff8080;//#1e1e1e;
  transition: all .5s ease;
}
.sidebar header{
  font-size: 28px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #1b1b1b;
  user-select: none;
  font-family: 'Montserrat', sans-serif;
}
.sidebar a{
  display: block;
  height: 65px;
  width: 100%;
  color: white;
  line-height: 65px;
  padding-left: 30px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  border-left: 5px solid transparent;
  font-family: 'Open Sans', sans-serif;
  transition: all .5s ease;
}
a.active,a:hover{
  border-left: 5px solid #b93632;
  color: #b93632;
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: absolute;
  cursor: pointer;
  color: white;
  border-radius: 5px;
  border: 1px solid #262626;
  margin: 15px 30px;
  font-size: 29px;
  background: #262626;
  height: 45px;
  width: 45px;
  text-align: center;
  line-height: 45px;
  transition: all .5s ease;
}
label #cancel{
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  margin-left: 245px;
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ label #cancel{
  margin-left: 245px;
  opacity: 1;
  visibility: visible;
}

@media(max-width : 860px){
  .sidebar{
    height: auto;
    width: 70px;
    left: 0;
    margin: 100px 0;
  }
  header,#btn,#cancel{
    display: none;
  }
  span{
    position: absolute;
    margin-left: 23px;
    opacity: 0;
    visibility: hidden;
  }
  .sidebar a{
    height: 60px;
  }
  .sidebar a i{
    margin-left: -10px;
  }
  a:hover {
    width: 200px;
    background: inherit;
  }
  .sidebar a:hover span{
    opacity: 1;
    visibility: visible;
  }
}
.form-control{
    width : 300px;
    height : 38px;
}
.btn{
    padding:5px;
    width:55px;
    height:30px;
    color:#d96459;
   // margin-left:120px;

}
.edit{
    color:#d96459;
}

        </style>
</head>
<body>
<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <a href="user_main.php" class="active">
        <i class="fas fa-user-alt"></i>
        <span>Profile</span>
      </a>
      <a href="user_update.php">
        <i class="fas fa-house-user"></i>
        <span>Update details</span>
      </a>
      <a href="user_donate.php">
        <i class="fas fa-burn"></i>
        <span>Donate blood</span>
      </a>
      <a href="user_request.php">
         <i class="fas fa-qrcode"></i>
        <span>Request blood</span>
      </a>
      <a href="check_status.php">
        <i class="fas fa-medkit"></i>
       <span>Check status</span>
     </a>
      <a href="login.html">
        <i class="fas fa-power-off"></i>
        <span>Logout</span>
      </a> 
    </div>
<?php
session_start();
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$user=$_SESSION['user'];
     $q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
     $row=mysqli_fetch_assoc($q);
    

$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
$password=$row['password'];
$mobile=$row['mobile'];
$DOB=$row['DOB'];
$gender=$row['gender'];
$address=$row['address'];
$bloodgroup=$row['bloodgroup'];

?>
<div class="edit">
<h1 style="margin-left:242px; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Edit Profile</h1><br>
<div class="profile_info" style="margin-left:280px; font-family: 'Montserrat', sans-serif; font-size:25px; ">
<span>Welcome,</span>
<h2><?php echo $row['firstname']; echo " "; echo $row['lastname'];?></h2>
</div><br><br>
<div class="form" style="margin-left:280px;  font-size:20px;">
<form action="user_update.php" method="post" enctype="multipart/form-data">
<label><h4><b>First Name: </b></h4></label>
<input class="form-control" type="text" name="firstname" value="<?php echo $firstname ?>"><br><br>
<label><h4><b>Last Name: </b></h4></label>
<input class="form-control" type="text" name="lastname" value="<?php echo $lastname ?>"><br><br>
<label><h4><b>Email: </b></h4></label>
<input class="form-control" type="text" name="email" value="<?php echo $email ?>"><br><br>
<label><h4><b>Password: </b></h4></label>
<input class="form-control" type="text" name="password" value="<?php echo $password ?>"><br><br>
<label><h4><b>Contact: </b></h4></label>
<input class="form-control" type="text" name="mobile" value="<?php echo $mobile ?>"><br><br>
<label><h4><b>Date of Birth: </b></h4></label>
<input class="form-control" type="text" name="DOB" value="<?php echo $DOB ?>"><br><br>
<label>Gender: </label><br>
<input type="radio" id="ma" name="gender" value="<?php echo $gender?>"hidden><span id="ma"></span>
        <input type="radio" id="ma" name="gender" value="m"><span id="ma">Male</span>
        <input type="radio" id="ma" name="gender" value="f"><span id="ma">Female</span>
        <input type="radio" id="ma" name="gender" value="o"><span id="ma">Other</span><br><br>
<label><h4><b>Address: </b></h4></label>
<input class="form-control" type="text" name="address" value="<?php echo $address ?>"><br><br>
<label>Blood Group:</label><br>
       <!-- <input type="text" id="name" name="bg">-->
       <select id="name" name="bloodgroup" required>
            <option value="<?php echo $bloodgroup?>"hidden><?php echo $bloodgroup?></option>
           <option value="A+">A+</option>
           <option value="A-">A-</option>
           <option value="B+">B+</option>
           <option value="B-">B-</option>
           <option value="O+">O+</option>
           <option value="O-">O-</option>
           <option value="AB+">AB+</option>
           <option value="AB-">AB-</option>

       </select>
      <br><br>
<button class="btn" name="submit123" type="submit">Save</button>
</div>
</form>
</div>
<?php
if(isset($_POST['submit123']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$bloodgroup=$_POST['bloodgroup'];

$sql1="UPDATE registration SET firstname='$firstname', lastname='$lastname',
email='$email', password='$password',confirmpassword='$password', 
mobile='$mobile',DOB='$DOB',gender='$gender',address='$address',bloodgroup='$bloodgroup' where email='".$_SESSION['user']."';";
if(mysqli_query($conn,$sql1))
{
    echo "<script> alert('Saved successfully'); window.location='user_main.php'</script>";
}
else{
    echo "<script> alert('failed'); window.location='user_main.php'</script>";
}
}
?>


</body>
</html>
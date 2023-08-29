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
.container-fluid{
    margin-left:0px;
}
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  height: 100vh;
  width: 100%;
  //background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.show-btn{
  //background: #fff;
  padding: 10px 20px;
  font-size: 20px;
  font-weight: 500;
  color: #3498db;
  cursor: pointer;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.show-btn, .container{
  //position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  float:right;
  margin-top:-450px;
}
/*
input[type="checkbox"]{
  display: none;
  
}*/
.container{
  display: none;
  background: #fff;
  width: 410px;
  padding: 30px;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
  
}
#show:checked ~ .container{
  display: block;
  
}
.container .close-btn{
  //position: absolute;
  right: 20px;
  top: 15px;
  font-size: 18px;
  cursor: pointer;
 
}
.container .close-btn:hover{
  color: #3498db;
}
.container .text{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
}
        </style>
</head>
<body>
<?php
session_start();
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$user= $_SESSION['user'];
$q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
$row=mysqli_fetch_assoc($q);
$id=$row['id'];

?>
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
<div class="edit">
<h1 style="margin-left:242px; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Blood Request</h1><br>
<div class="profile_info" style="margin-left:280px; font-family: 'Montserrat', sans-serif; font-size:25px; ">
<div class="container-fluid">
	<form action="" id="manage-request" method="post" autocomplete="off">
		<div id="msg"></div>

		<div class="form-group">
			<label for="" class="control-label"><b>Patient's Full Name :</b></label><br>
			<input type="text" class="form-control" name="patient"  value="" required><br><br>
		</div>	<div class="form-group">
			<label for="" class="control-label">Contact:</label><br>
			<input type="text" class="form-control" name="contact"  value="" required><br><br>
		</div>

		<div class="form-group">
	        <label for="" class="control-label"><b>Blood type :</b></label><br>
			<select name="bloodtype" id="" class="custom-select select2" required>
				<option value=""></option>
				<option>A+</option>
				<option>A-</option>
				<option>B+</option>
				<option>B-</option>
				<option>AB+</option>
				<option>AB-</option>
				<option>O+</option>
				<option>O-</option>
			</select>
      <br><br>
		</div>
    <div class="form-group">
			<label for="" class="control-label">Blood Component :</label><br>
			<select name="bloodcomponent" id="" class="custom-select select5" required>
      <option value=""></option>
				<option>whole Blood</option>
				<option>Red Cells</option>
				<option>Platelets</option>
				<option>Plasma</option>
				<option>Cryo</option>
				<option>White Cells & Granulocytes</option>
        </select>
 <br><br>
  </div>
		<div class="form-group">
			<label for="" class="control-label">Volume (L) :</label><br>
			<input type="number" class="form-control" name="volume"  value="" required><br><br>

		</div>
    <div class="form-group">
			<label for="" class="control-label"><b>Date :</b></label><br>
			<input type="text" class="form-control" name="date"  value="" required><br><br>
      <button class="btn" name="request123" style="margin-bottom:20px;" type="submit">send</button>
		</div>
   </form>
   </div>
   <?php
    if(isset($_POST["request123"]))
    {
      $name=$_POST['patient'];
      $contact=$_POST['contact'];
      $bloodtype=$_POST['bloodtype'];
      $bloodcomponent=$_POST['bloodcomponent'];
      $volume=$_POST['volume'];
      $date=$_POST['date'];
     $query="INSERT INTO request_blood VALUES('','$name',' $contact','$bloodtype','$bloodcomponent','$volume','$date','pending','$id')";
     $data = mysqli_query($conn,$query);
     if($data)
     {
       echo "<script> alert('Request sent successfully'); window.location='check_status.php';</script>";
     }

    }



  ?>
  
    

    
    


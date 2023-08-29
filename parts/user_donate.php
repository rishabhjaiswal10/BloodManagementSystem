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

input[type=text], select {
 width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
 width: 100%;
  background-color: #4CAF50;
  color: white;
 padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
h3{
    font-size:35px;
    text-align:center;
}
.data {
  border-radius: 5px;
  //background-color: #f2f2f2;
  padding: 20px;
  width:30%;
  margin-top:5px;
  margin-left:43%;
  //height:100px;
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
p{
    margin-left:22%;
    font-size:25px;
    word-spacing :2px;
    padding-top:10px;
    color:#353935;

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

$user=$_SESSION['user'];
$q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
$row=mysqli_fetch_assoc($q);
$id=$row['id'];
$name1=$row['firstname'];
$contact1=$row['mobile'];

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
      <a href="#">
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
    <h1 style="margin-left:242px; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Donate Blood</h1><br>

<h2 style="margin-left:45%; text-decoration:underline; font-size:40px; text-shadow: 2px 2px 5px #d96459;
    letter-spacing: 2px;
    word-spacing :3px; font-family:  Arial, Helvetica, sans-serif;">How to donate<h2>
<p style="margin-left:20%;  font-family:  Arial, Helvetica, sans-serif ">You have to select your desired location to donate blood and put up an online request for donating blood. If your request gets accepted then you can go your selected center and donate blood there.</p>
  <span class="popuptext" id="myPopup">Popup text...</span>
</div>
<div class="data"> 
  <form action="" method="post">
    <label>Age</label>
    <input type="text" name="age" placeholder="Enter your age">
  <label>State</label>
                        <select id="name" name="state">
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                
                       </select>
    
                       <label>District</label><br>
                        <select id="name" name="loc">
                            <option value="select">select</option>
                           <option value="Ahmednagar">Ahmednagar</option>
                           <option value="Akola">Akola</option>
                           <option value="Aurangabad">Aurangabad</option>
                           <option value="Bhandara">Bhandara</option>
                           <option value="Chandrapur">Chandrapur</option>
                           <option value="Dhule">Dhule</option>
                           <option value="Gadchiroli">Gadchiroli</option>
                           <option value="Gondia">Gondia</option>
                           <option value="Hingoli">Hingoli</option>
                           <option value="Jalgaon">Jalgaon</option>
                           <option value="Jalna">Jalna</option>
                           <option value="Kolhapur">Kolhapur</option>
                           <option value="Latur">Latur</option>
                           <option value="Mumbai">Mumbai</option>
                           <option value="Nandurbar">Nandurbar</option>
                           <option value="Nanded">Nanded</option>
                           <option value="Nagpur">Nagpur</option>
                           <option value="Nashik">Nashik</option>
                           <option value="Osmanabad">Osmanabad</option>
                           <option value="Parbhani">Parbhani</option>
                           <option value="Pune">Pune</option>
                           <option value="Raigad">Raigad</option>


                
                       </select>

    <label for="bloodcomponent">Blood bank</label>
    <select name="bb" id="" class="custom-select select5" required>
      <option value="select">select</option>
      <option>Breach Candy Hospital Trust Blood Bank<option>
<option>Dr. L.H.Hiranandani Hospital Blood Bank<option>
<option>BYL Nair Hospital Blood Bank<option>
<option>Indian Red Cross Society NHQ Blood Center<option>
<option>Dr. Ram Manohar Lohia Hospital Blood Bank<option>
<option>Goa Medical College Blood Bank<option>
<option>Manipal Hospital Blood Bank<option>
<option>GMERS General Hospital Gandhinagar<option>
<option>Indian Red Cross Society Blood Bank<option>
<option>IMA MANSA CHARITABLE TRUST SANCHALIT C.M.K. & P.N.N. VOLUNTARY BLOOD BANK<option>
<option>Bhiwandi Blood Bank<option>
<option>M/S Triumph Foundations Triumph Blood Bank<option>
<option>Navjeevan Blood Bank managed by SPVF<option>
<option>Plasma Blood Bank<option>
<option>Navi Mumbai Municipal Corporation Blood Bank<option>
<option>ACTREC BLOOD BANK<option>
<option>BOMBAY HOSPITAL TRUST BLOOD BANK<option>
<option>Pallavi Blood Bank<option>
<option>Ashirwaad Blood Bank<option>
<option>Fortis Hospital Blood Bank<option>
<option>Holy Spirit Hospital Blood Bank<option>
<option>KEM Hospital Blood Bank<option>
<option>Lilavati Hospital Blood Bank<option>
<option>Global Hospital Blood Bank<option>



        </select>
   
   <input type="submit" name="insert1" class="button" value="Submit"><br><br>
   
  </form>
  
</div>
</body>
</html>
<?php
if(isset($_POST['insert1']))
{
  $_SESSION['user_id']=$id;
  $name1=$_POST[$name1];
  $contact1=$_POST[$contact1];
  $age=$_POST['age'];
  $state=$_POST['state'];
  $district=$_POST['loc'];
  $bb=$_POST['bb'];
  $donor="insert into donors(age,state,district,bloodbank,user_id) values('$age','$state','$district','$bb','$id')";
  $data=mysqli_query($conn,$donor);
  if($data)
  {
    echo "<script>alert('Request sent successfully'); window.location='check_status.php?$id';</script>";
  }
  else
  {
    echo "<script>alert('unsuccessfull');</script>";
  }
}

?>